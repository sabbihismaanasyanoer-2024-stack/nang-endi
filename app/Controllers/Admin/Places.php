<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PlaceModel;
use Config\Database;

class Places extends BaseController
{
    protected $placeModel;
    protected $db;

    public function __construct()
    {
        $this->placeModel = new PlaceModel();
        $this->db = Database::connect();
    }


    /**
     * Daftar semua Place
     */
    public function index()
    {
        // ==========================================
        // FILTER SUBCATEGORY
        // ==========================================

        $subcategory = strtoupper(
            trim(
                (string) $this->request->getGet('subcategory')
            )
        );


        // ==========================================
        // AMBIL DATA PLACE
        // ==========================================

        $builder = $this->placeModel;


        if (
            $subcategory !== '' &&
            $subcategory !== 'ALL'
        ) {
            $builder
                ->join(
                    'place_subcategories',
                    'place_subcategories.place_id = places.id',
                    'inner'
                )
                ->where(
                    'place_subcategories.subcategory',
                    $subcategory
                )
                ->distinct();
        }


        $places = $builder
            ->orderBy('places.id', 'DESC')
            ->findAll();


        // ==========================================
        // AMBIL SEMUA SUBCATEGORY
        // ==========================================

        $subcategoryRows = $this->db
            ->table('place_subcategories')
            ->select('subcategory')
            ->distinct()
            ->orderBy('subcategory', 'ASC')
            ->get()
            ->getResultArray();


        $subcategories = array_column(
            $subcategoryRows,
            'subcategory'
        );


        // ==========================================
        // AMBIL RELASI SUBCATEGORY PLACE
        // ==========================================

        $placeIds = array_column(
            $places,
            'id'
        );

        $subcategoryMap = [];


        if (!empty($placeIds)) {

            $rows = $this->db
                ->table('place_subcategories')
                ->whereIn(
                    'place_id',
                    $placeIds
                )
                ->orderBy(
                    'subcategory',
                    'ASC'
                )
                ->get()
                ->getResultArray();


            foreach ($rows as $row) {

                $placeId = (int) $row['place_id'];


                if (!isset($subcategoryMap[$placeId])) {
                    $subcategoryMap[$placeId] = [];
                }


                $subcategoryMap[$placeId][] =
                    strtoupper($row['subcategory']);
            }
        }


        // ==========================================
        // MASUKKAN SUBCATEGORY KE DATA PLACE
        // ==========================================

        foreach ($places as &$place) {

            $placeId = (int) $place['id'];


            if (
                isset($subcategoryMap[$placeId]) &&
                !empty($subcategoryMap[$placeId])
            ) {

                $place['subcategory_names'] =
                    $subcategoryMap[$placeId];

            } elseif (!empty($place['subcategory'])) {

                // Fallback data lama

                $place['subcategory_names'] = [
                    strtoupper(
                        $place['subcategory']
                    )
                ];

            } else {

                $place['subcategory_names'] = [];
            }
        }


        unset($place);


        return view(
            'admin/places/index',
            [
                'places'        => $places,
                'subcategories' => $subcategories,
                'subcategory'   => $subcategory
            ]
        );
    }


    /**
     * Form tambah Place
     */
    public function create()
    {
        return view('admin/places/create');
    }


    /**
     * Simpan Place baru
     */
    public function store()
    {
        $rules = [
            'name' => [
                'label' => 'Nama Place',
                'rules' => 'required|max_length[255]'
            ],

            'slug' => [
                'label' => 'Slug',
                'rules' => 'required|max_length[255]|is_unique[places.slug]'
            ],

            'image' => [
                'label' => 'Gambar',
                'rules' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,5120]'
            ]
        ];


        if (!$this->validate($rules)) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }


        // ==========================================
        // AMBIL MULTIPLE SUBCATEGORY
        // ==========================================

        $subcategories =
            $this->request->getPost('subcategories');


        if (!is_array($subcategories)) {
            $subcategories = [];
        }


        $subcategories = array_values(
            array_unique(
                array_filter(
                    array_map(
                        function ($value) {
                            return strtoupper(
                                trim((string) $value)
                            );
                        },
                        $subcategories
                    )
                )
            )
        );


        // ==========================================
        // DATA PLACE
        // ==========================================

        $data = [
            'category_id'   => $this->request->getPost('category_id'),

            // Simpan pilihan pertama ke field lama
            // sebagai fallback sementara.
            'subcategory'   => $subcategories[0] ?? null,

            'name'          => $this->request->getPost('name'),
            'slug'          => $this->request->getPost('slug'),
            'description'   => $this->request->getPost('description'),
            'address'       => $this->request->getPost('address'),
            'opening_hours' => $this->request->getPost('opening_hours'),
            'price'         => $this->request->getPost('price') ?: 0,
            'latitude'      => $this->request->getPost('latitude'),
            'longitude'     => $this->request->getPost('longitude'),
            'phone'         => $this->request->getPost('phone'),
            'website'       => $this->request->getPost('website'),
            'instagram'     => $this->request->getPost('instagram'),
        ];


        // ==========================================
        // UPLOAD GAMBAR
        // ==========================================

        $image = $this->request->getFile('image');


        if (
            $image &&
            $image->isValid() &&
            !$image->hasMoved()
        ) {

            $newName = $this->generateImageName(
                $data['name'],
                $image->getExtension()
            );


            $uploadPath =
                FCPATH . 'assets/images/places/';


            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }


            $image->move(
                $uploadPath,
                $newName
            );


            $data['image'] =
                '/assets/images/places/' . $newName;
        }


        // ==========================================
        // SIMPAN PLACE + SUBCATEGORY
        // ==========================================

        $this->db->transStart();


        $this->placeModel->insert($data);

        $placeId = $this->placeModel->getInsertID();


        if (
            $placeId &&
            !empty($subcategories)
        ) {

            $subcategoryRows = [];


            foreach ($subcategories as $item) {

                $subcategoryRows[] = [
                    'place_id'    => $placeId,
                    'subcategory' => $item
                ];
            }


            $this->db
                ->table('place_subcategories')
                ->insertBatch(
                    $subcategoryRows
                );
        }


        $this->db->transComplete();


        if ($this->db->transStatus() === false) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    [
                        'Gagal menyimpan place.'
                    ]
                );
        }


        return redirect()
            ->to('/admin/places')
            ->with(
                'success',
                'Place berhasil ditambahkan.'
            );
    }


    /**
     * Form edit Place
     */
    public function edit($id)
    {
        $place = $this->placeModel->find($id);


        if (!$place) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Place tidak ditemukan.'
            );
        }


        // ==========================================
        // AMBIL SUBCATEGORY YANG SUDAH DIMILIKI
        // ==========================================

        $rows = $this->db
            ->table('place_subcategories')
            ->select('subcategory')
            ->where(
                'place_id',
                $id
            )
            ->orderBy(
                'subcategory',
                'ASC'
            )
            ->get()
            ->getResultArray();


        $selectedSubcategories = array_map(
            function ($row) {
                return strtoupper(
                    $row['subcategory']
                );
            },
            $rows
        );


        // ==========================================
        // FALLBACK DATA LAMA
        // ==========================================

        if (
            empty($selectedSubcategories) &&
            !empty($place['subcategory'])
        ) {

            $selectedSubcategories = [
                strtoupper(
                    $place['subcategory']
                )
            ];
        }


        return view(
            'admin/places/edit',
            [
                'place' =>
                    $place,

                'selectedSubcategories' =>
                    $selectedSubcategories
            ]
        );
    }


    /**
     * View / Detail Place
     */
    public function view($id)
    {
        $place = $this->placeModel->find($id);


        if (!$place) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Place tidak ditemukan.'
            );
        }


        return view(
            'admin/places/view',
            [
                'place' => $place
            ]
        );
    }


    /**
     * Update Place
     */
    public function update($id)
    {
        $place = $this->placeModel->find($id);


        if (!$place) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Place tidak ditemukan.'
            );
        }


        $rules = [
            'name' => [
                'label' => 'Nama Place',
                'rules' => 'required|max_length[255]'
            ],

            'slug' => [
                'label' => 'Slug',
                'rules' => "required|max_length[255]|is_unique[places.slug,id,{$id}]"
            ],

            'image' => [
                'label' => 'Gambar',
                'rules' => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image,5120]'
            ]
        ];


        if (!$this->validate($rules)) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    $this->validator->getErrors()
                );
        }


        // ==========================================
        // AMBIL MULTIPLE SUBCATEGORY
        // ==========================================

        $subcategories =
            $this->request->getPost('subcategories');


        if (!is_array($subcategories)) {
            $subcategories = [];
        }


        $subcategories = array_values(
            array_unique(
                array_filter(
                    array_map(
                        function ($value) {
                            return strtoupper(
                                trim((string) $value)
                            );
                        },
                        $subcategories
                    )
                )
            )
        );


        // ==========================================
        // DATA PLACE
        // ==========================================

        $data = [
            'category_id'   => $this->request->getPost('category_id'),

            // Simpan pilihan pertama ke field lama
            // sebagai fallback sementara.
            'subcategory'   => $subcategories[0] ?? null,

            'name'          => $this->request->getPost('name'),
            'slug'          => $this->request->getPost('slug'),
            'description'   => $this->request->getPost('description'),
            'address'       => $this->request->getPost('address'),
            'opening_hours' => $this->request->getPost('opening_hours'),
            'price'         => $this->request->getPost('price') ?: 0,
            'latitude'      => $this->request->getPost('latitude'),
            'longitude'     => $this->request->getPost('longitude'),
            'phone'         => $this->request->getPost('phone'),
            'website'       => $this->request->getPost('website'),
            'instagram'     => $this->request->getPost('instagram'),
        ];


        // ==========================================
        // HAPUS GAMBAR LAMA
        // ==========================================

        $deleteImage =
            $this->request->getPost('delete_image');


        if ($deleteImage) {

            $this->deletePlaceImage(
                $place['image']
            );

            $data['image'] = null;
        }


        // ==========================================
        // UPLOAD GAMBAR BARU
        // ==========================================

        $image =
            $this->request->getFile('image');


        if (
            $image &&
            $image->isValid() &&
            !$image->hasMoved()
        ) {

            $newName = $this->generateImageName(
                $data['name'],
                $image->getExtension()
            );


            $uploadPath =
                FCPATH . 'assets/images/places/';


            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }


            $image->move(
                $uploadPath,
                $newName
            );


            $this->deletePlaceImage(
                $place['image']
            );


            $data['image'] =
                '/assets/images/places/' . $newName;
        }


        // ==========================================
        // UPDATE PLACE + SUBCATEGORY
        // ==========================================

        $this->db->transStart();


        // Update data utama
        $this->placeModel->update(
            $id,
            $data
        );


        // Hapus seluruh subcategory lama
        $this->db
            ->table('place_subcategories')
            ->where(
                'place_id',
                $id
            )
            ->delete();


        // Masukkan subcategory baru
        if (!empty($subcategories)) {

            $subcategoryRows = [];


            foreach ($subcategories as $item) {

                $subcategoryRows[] = [
                    'place_id'    => $id,
                    'subcategory' => $item
                ];
            }


            $this->db
                ->table('place_subcategories')
                ->insertBatch(
                    $subcategoryRows
                );
        }


        $this->db->transComplete();


        if ($this->db->transStatus() === false) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    [
                        'Gagal memperbarui place.'
                    ]
                );
        }


        return redirect()
            ->to('/admin/places')
            ->with(
                'success',
                'Place berhasil diperbarui.'
            );
    }


    /**
     * Delete Place
     */
    public function delete($id)
    {
        $place = $this->placeModel->find($id);


        if (!$place) {

            return redirect()
                ->to('/admin/places')
                ->with(
                    'error',
                    'Place tidak ditemukan.'
                );
        }


        $this->deletePlaceImage(
            $place['image']
        );


        $this->placeModel->delete($id);


        return redirect()
            ->to('/admin/places')
            ->with(
                'success',
                'Place berhasil dihapus.'
            );
    }


    /**
     * Generate nama file gambar
     */
    private function generateImageName(
        $name,
        $extension
    ) {

        $slug = url_title(
            strtolower($name),
            '-',
            true
        );


        if ($slug === '') {
            $slug = 'place';
        }


        return $slug .
            '-' .
            bin2hex(random_bytes(6)) .
            '.' .
            strtolower($extension);
    }


    /**
     * Hapus gambar Place
     */
    private function deletePlaceImage(
        $imagePath
    ) {

        if (empty($imagePath)) {
            return;
        }


        $uploadDirectory = realpath(
            FCPATH . 'assets/images/places/'
        );


        if ($uploadDirectory === false) {
            return;
        }


        $fileName = basename(
            $imagePath
        );


        if (
            $fileName === '.' ||
            $fileName === '..' ||
            $fileName === ''
        ) {
            return;
        }


        $filePath =
            $uploadDirectory .
            DIRECTORY_SEPARATOR .
            $fileName;


        $realFilePath =
            realpath($filePath);


        if (
            $realFilePath !== false &&
            is_file($realFilePath) &&
            dirname($realFilePath) ===
                $uploadDirectory
        ) {

            unlink($realFilePath);
        }
    }
}