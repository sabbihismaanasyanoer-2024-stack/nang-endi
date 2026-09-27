<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EventModel;

class Events extends BaseController
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }


    /**
     * Cek login admin
     */
    protected function checkAdmin()
    {
        if (session()->get('is_admin_logged_in') !== true) {
            return redirect()->to('/admin/login');
        }

        return null;
    }


    /**
     * Kategori event yang valid
     */
    protected function validCategoryIds(): array
    {
        return [
            1,  // Music
            2,  // Art & Exhibition
            3,  // Food & Culinary
            4,  // Culture & Heritage
            5,  // Education
            6,  // Sport
            7,  // Festival
            8,  // Community
            16, // Workshop
        ];
    }


    /**
     * Daftar event
     */
    public function index()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $events = $this->eventModel
            ->orderBy('id', 'DESC')
            ->findAll();

        return view('admin/events/index', [
            'events' => $events
        ]);
    }


    /**
     * Form tambah event
     */
    public function create()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        return view('admin/events/create');
    }


    /**
     * Simpan event baru
     */
    public function store()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }


        // =========================
        // AMBIL INPUT
        // =========================

        $categoryId = (int) $this->request->getPost('category_id');

        $title = trim(
            (string) $this->request->getPost('title')
        );

        $slug = trim(
            (string) $this->request->getPost('slug')
        );

        $dateStart = trim(
            (string) $this->request->getPost('date_start')
        );

        $locationName = trim(
            (string) $this->request->getPost('location_name')
        );

        $status = trim(
            (string) $this->request->getPost('status')
        );

        if ($status === '') {
            $status = 'draft';
        }


        // =========================
        // VALIDASI MANUAL
        // =========================

        $errors = [];


        if (!in_array(
            $categoryId,
            $this->validCategoryIds(),
            true
        )) {
            $errors['category_id'] =
                'Kategori event tidak valid.';
        }


        if ($title === '') {
            $errors['title'] =
                'Judul event wajib diisi.';
        } elseif (mb_strlen($title) > 255) {
            $errors['title'] =
                'Judul event maksimal 255 karakter.';
        }


        if ($slug === '') {
            $errors['slug'] =
                'Slug wajib diisi.';
        } elseif (mb_strlen($slug) > 255) {
            $errors['slug'] =
                'Slug maksimal 255 karakter.';
        }


        if ($dateStart === '') {
            $errors['date_start'] =
                'Tanggal mulai wajib diisi.';
        }


        if ($locationName === '') {
            $errors['location_name'] =
                'Nama lokasi wajib diisi.';
        } elseif (mb_strlen($locationName) > 255) {
            $errors['location_name'] =
                'Nama lokasi maksimal 255 karakter.';
        }


        if (!in_array(
            $status,
            ['draft', 'published'],
            true
        )) {
            $errors['status'] =
                'Status event tidak valid.';
        }


        // =========================
        // CEK SLUG DUPLIKAT
        // =========================

        if ($slug !== '') {

            $existingSlug = $this->eventModel
                ->where('slug', $slug)
                ->first();

            if ($existingSlug) {
                $errors['slug'] =
                    'Slug tersebut sudah digunakan.';
            }
        }


        // =========================
        // VALIDASI GAMBAR
        // =========================

        $image = $this->request->getFile('image');

        if ($image && $image->getError() !== UPLOAD_ERR_NO_FILE) {

            if (!$image->isValid()) {
                $errors['image'] =
                    $image->getErrorString();
            } else {

                $allowedExtensions = [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp',
                    'gif'
                ];

                $extension =
                    strtolower(
                        $image->getClientExtension()
                    );

                if (!in_array(
                    $extension,
                    $allowedExtensions,
                    true
                )) {
                    $errors['image'] =
                        'Format gambar harus JPG, JPEG, PNG, WEBP, atau GIF.';
                }


                if ($image->getSizeByUnit('mb') > 5) {
                    $errors['image'] =
                        'Ukuran gambar maksimal 5 MB.';
                }


                if (!in_array(
                    $image->getMimeType(),
                    [
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                        'image/gif'
                    ],
                    true
                )) {
                    $errors['image'] =
                        'File yang dipilih bukan gambar yang valid.';
                }
            }
        }


        // =========================
        // JIKA ADA ERROR
        // =========================

        if (!empty($errors)) {

            return redirect()
                ->to(site_url('admin/events/create'))
                ->withInput()
                ->with('errors', $errors);
        }


        // =========================
        // DATA EVENT
        // =========================

        $data = [

            'category_id' =>
                $categoryId,

            'title' =>
                $title,

            'slug' =>
                $slug,

            'description' =>
                (string) $this->request->getPost('description'),

            'image' =>
                null,

            'date_start' =>
                $dateStart,

            'date_end' =>
                $this->request->getPost('date_end')
                    ?: null,

            'time_start' =>
                $this->request->getPost('time_start')
                    ?: null,

            'time_end' =>
                $this->request->getPost('time_end')
                    ?: null,

            'location_name' =>
                $locationName,

            'address' =>
                (string) $this->request->getPost('address'),

            'latitude' =>
                $this->request->getPost('latitude')
                    ?: null,

            'longitude' =>
                $this->request->getPost('longitude')
                    ?: null,

            'price' =>
                $this->request->getPost('price') !== ''
                    ? (int) $this->request->getPost('price')
                    : 0,

            'registration_url' =>
                trim(
                    (string) $this->request->getPost(
                        'registration_url'
                    )
                ),

            'organizer_name' =>
                trim(
                    (string) $this->request->getPost(
                        'organizer_name'
                    )
                ),

            'organizer_contact' =>
                trim(
                    (string) $this->request->getPost(
                        'organizer_contact'
                    )
                ),

            'status' =>
                $status,

            'is_partner' =>
                $this->request->getPost('is_partner')
                    ? 1
                    : 0,
        ];


        // =========================
        // UPLOAD GAMBAR
        // =========================

        if (
            $image &&
            $image->getError() !== UPLOAD_ERR_NO_FILE &&
            $image->isValid() &&
            !$image->hasMoved()
        ) {

            $uploadPath =
                FCPATH . 'uploads/events/';


            if (!is_dir($uploadPath)) {

                if (!mkdir(
                    $uploadPath,
                    0777,
                    true
                )) {

                    return redirect()
                        ->to(
                            site_url(
                                'admin/events/create'
                            )
                        )
                        ->withInput()
                        ->with(
                            'errors',
                            [
                                'image' =>
                                    'Folder upload gambar tidak dapat dibuat.'
                            ]
                        );
                }
            }


            $newName =
                $image->getRandomName();


            try {

                $image->move(
                    $uploadPath,
                    $newName
                );

            } catch (\Throwable $e) {

                return redirect()
                    ->to(
                        site_url(
                            'admin/events/create'
                        )
                    )
                    ->withInput()
                    ->with(
                        'errors',
                        [
                            'image' =>
                                'Gambar gagal diupload: ' .
                                $e->getMessage()
                        ]
                    );
            }


            $data['image'] =
                'uploads/events/' . $newName;
        }


        // =========================
        // INSERT DATABASE
        // =========================

        try {

            $inserted =
                $this->eventModel->insert(
                    $data
                );

        } catch (\Throwable $e) {

            // Kalau database gagal,
            // hapus gambar yang baru saja diupload.

            if (!empty($data['image'])) {

                $uploadedImage =
                    FCPATH . $data['image'];

                if (is_file($uploadedImage)) {
                    unlink($uploadedImage);
                }
            }


            return redirect()
                ->to(
                    site_url(
                        'admin/events/create'
                    )
                )
                ->withInput()
                ->with(
                    'errors',
                    [
                        'database' =>
                            'Event gagal disimpan: ' .
                            $e->getMessage()
                    ]
                );
        }


        // =========================
        // CEK HASIL INSERT
        // =========================

        if (!$inserted) {

            if (!empty($data['image'])) {

                $uploadedImage =
                    FCPATH . $data['image'];

                if (is_file($uploadedImage)) {
                    unlink($uploadedImage);
                }
            }


            return redirect()
                ->to(
                    site_url(
                        'admin/events/create'
                    )
                )
                ->withInput()
                ->with(
                    'errors',
                    [
                        'database' =>
                            'Event tidak berhasil disimpan ke database.'
                    ]
                );
        }


        // =========================
        // BERHASIL
        // =========================

        return redirect()
            ->to(
                site_url(
                    'admin/events'
                )
            )
            ->with(
                'success',
                'Event berhasil ditambahkan.'
            );
    }


    /**
     * Form edit event
     */
    public function edit($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }


        $event =
            $this->eventModel->find($id);


        if (!$event) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Event tidak ditemukan.'
            );
        }


        return view(
            'admin/events/edit',
            [
                'event' => $event
            ]
        );
    }


    /**
     * Update event
     */
    public function update($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }


        $event =
            $this->eventModel->find($id);


        if (!$event) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Event tidak ditemukan.'
            );
        }


        $rules = [

            'category_id' => [
                'label' => 'Kategori Event',
                'rules' =>
                    'required|in_list[1,2,3,4,5,6,7,8,16]'
            ],

            'title' => [
                'label' => 'Judul Event',
                'rules' =>
                    'required|max_length[255]'
            ],

            'slug' => [
                'label' => 'Slug',
                'rules' =>
                    "required|max_length[255]|is_unique[events.slug,id,{$id}]"
            ],

            'date_start' => [
                'label' => 'Tanggal Mulai',
                'rules' =>
                    'required'
            ],

            'location_name' => [
                'label' => 'Lokasi',
                'rules' =>
                    'required|max_length[255]'
            ],

            'image' => [
                'label' => 'Gambar Event',
                'rules' =>
                    'permit_empty|is_image[image]|max_size[image,5120]'
            ],

            'status' => [
                'label' => 'Status',
                'rules' =>
                    'permit_empty|in_list[draft,published]'
            ],
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


        $data = [

            'category_id' =>
                (int) $this->request->getPost(
                    'category_id'
                ),

            'title' =>
                trim(
                    (string) $this->request->getPost(
                        'title'
                    )
                ),

            'slug' =>
                trim(
                    (string) $this->request->getPost(
                        'slug'
                    )
                ),

            'description' =>
                $this->request->getPost(
                    'description'
                ),

            'date_start' =>
                $this->request->getPost(
                    'date_start'
                ),

            'date_end' =>
                $this->request->getPost(
                    'date_end'
                ) ?: null,

            'time_start' =>
                $this->request->getPost(
                    'time_start'
                ) ?: null,

            'time_end' =>
                $this->request->getPost(
                    'time_end'
                ) ?: null,

            'location_name' =>
                trim(
                    (string) $this->request->getPost(
                        'location_name'
                    )
                ),

            'address' =>
                $this->request->getPost(
                    'address'
                ),

            'latitude' =>
                $this->request->getPost(
                    'latitude'
                ) ?: null,

            'longitude' =>
                $this->request->getPost(
                    'longitude'
                ) ?: null,

            'price' =>
                $this->request->getPost('price') !== ''
                    ? (int) $this->request->getPost('price')
                    : 0,

            'registration_url' =>
                trim(
                    (string) $this->request->getPost(
                        'registration_url'
                    )
                ),

            'organizer_name' =>
                trim(
                    (string) $this->request->getPost(
                        'organizer_name'
                    )
                ),

            'organizer_contact' =>
                trim(
                    (string) $this->request->getPost(
                        'organizer_contact'
                    )
                ),

            'status' =>
                $this->request->getPost('status')
                    ?: 'draft',

            'is_partner' =>
                $this->request->getPost('is_partner')
                    ? 1
                    : 0,
        ];


        // =========================
        // UPLOAD GAMBAR BARU
        // =========================

        $image =
            $this->request->getFile('image');


        if (
            $image &&
            $image->isValid() &&
            !$image->hasMoved()
        ) {

            $uploadPath =
                FCPATH . 'uploads/events/';


            if (!is_dir($uploadPath)) {
                mkdir(
                    $uploadPath,
                    0777,
                    true
                );
            }


            $newName =
                $image->getRandomName();


            try {

                $image->move(
                    $uploadPath,
                    $newName
                );

            } catch (\Throwable $e) {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'errors',
                        [
                            'image' =>
                                'Gambar gagal diupload: ' .
                                $e->getMessage()
                        ]
                    );
            }


            $data['image'] =
                'uploads/events/' . $newName;


            // Hapus gambar lama
            if (!empty($event['image'])) {

                $oldImage =
                    FCPATH . $event['image'];

                if (is_file($oldImage)) {
                    unlink($oldImage);
                }
            }
        }


        // =========================
        // UPDATE
        // =========================

        try {

            $updated =
                $this->eventModel->update(
                    $id,
                    $data
                );

        } catch (\Throwable $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    [
                        'database' =>
                            'Event gagal diperbarui: ' .
                            $e->getMessage()
                    ]
                );
        }


        if (!$updated) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'errors',
                    [
                        'database' =>
                            'Event tidak berhasil diperbarui.'
                    ]
                );
        }


        return redirect()
            ->to(
                site_url(
                    'admin/events'
                )
            )
            ->with(
                'success',
                'Event berhasil diperbarui.'
            );
    }


    /**
     * Hapus event
     */
    public function delete($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }


        $event =
            $this->eventModel->find($id);


        if (!$event) {

            return redirect()
                ->to(
                    site_url(
                        'admin/events'
                    )
                )
                ->with(
                    'error',
                    'Event tidak ditemukan.'
                );
        }


        // Hapus gambar
        if (!empty($event['image'])) {

            $imagePath =
                FCPATH . $event['image'];

            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }


        // Hapus event
        $this->eventModel->delete($id);


        return redirect()
            ->to(
                site_url(
                    'admin/events'
                )
            )
            ->with(
                'success',
                'Event berhasil dihapus.'
            );
    }
}