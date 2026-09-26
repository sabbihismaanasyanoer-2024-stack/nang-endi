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
     * Validasi kategori event
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
     * Daftar semua event
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


        $rules = [
            'category_id' => [
                'label' => 'Kategori Event',
                'rules' => 'required|in_list[1,2,3,4,5,6,7,8,16]'
            ],

            'title' => [
                'label' => 'Judul Event',
                'rules' => 'required|max_length[255]'
            ],

            'slug' => [
                'label' => 'Slug',
                'rules' => 'required|max_length[255]|is_unique[events.slug]'
            ],

            'date_start' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required'
            ],

            'location_name' => [
                'label' => 'Lokasi',
                'rules' => 'required|max_length[255]'
            ],

            'image' => [
                'label' => 'Gambar Event',
                'rules' => 'permit_empty|is_image[image]|max_size[image,5120]'
            ],

            'status' => [
                'label' => 'Status',
                'rules' => 'permit_empty|in_list[draft,published]'
            ],
        ];


        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        $image = $this->request->getFile('image');


        if ($image && $image->isValid() && !$image->hasMoved()) {

            $uploadPath = FCPATH . 'uploads/events/';


            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }


            $newName = $image->getRandomName();


            $image->move(
                $uploadPath,
                $newName
            );


            $imagePath = 'uploads/events/' . $newName;
        }


        /*
        |--------------------------------------------------------------------------
        | DATA EVENT
        |--------------------------------------------------------------------------
        */

        $data = [

            'category_id' =>
                (int) $this->request->getPost('category_id'),

            'title' =>
                trim($this->request->getPost('title')),

            'slug' =>
                trim($this->request->getPost('slug')),

            'description' =>
                $this->request->getPost('description'),

            'image' =>
                $imagePath,

            'date_start' =>
                $this->request->getPost('date_start'),

            'date_end' =>
                $this->request->getPost('date_end'),

            'time_start' =>
                $this->request->getPost('time_start'),

            'time_end' =>
                $this->request->getPost('time_end'),

            'location_name' =>
                trim($this->request->getPost('location_name')),

            'address' =>
                $this->request->getPost('address'),

            'latitude' =>
                $this->request->getPost('latitude'),

            'longitude' =>
                $this->request->getPost('longitude'),

            'price' =>
                $this->request->getPost('price') !== ''
                    ? (int) $this->request->getPost('price')
                    : 0,

            'registration_url' =>
                trim($this->request->getPost('registration_url')),

            'organizer_name' =>
                trim($this->request->getPost('organizer_name')),

            'organizer_contact' =>
                trim($this->request->getPost('organizer_contact')),

            'status' =>
                $this->request->getPost('status') ?: 'draft',

            'is_partner' =>
                $this->request->getPost('is_partner')
                    ? 1
                    : 0,
        ];


        $this->eventModel->insert($data);


        return redirect()
            ->to('/admin/events')
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


        $event = $this->eventModel->find($id);


        if (!$event) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Event tidak ditemukan.'
            );
        }


        return view('admin/events/edit', [
            'event' => $event
        ]);
    }


    /**
     * Update event
     */
    public function update($id)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }


        $event = $this->eventModel->find($id);


        if (!$event) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Event tidak ditemukan.'
            );
        }


        $rules = [

            'category_id' => [
                'label' => 'Kategori Event',
                'rules' => 'required|in_list[1,2,3,4,5,6,7,8,16]'
            ],

            'title' => [
                'label' => 'Judul Event',
                'rules' => 'required|max_length[255]'
            ],

            'slug' => [
                'label' => 'Slug',
                'rules' =>
                    "required|max_length[255]|is_unique[events.slug,id,{$id}]"
            ],

            'date_start' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required'
            ],

            'location_name' => [
                'label' => 'Lokasi',
                'rules' => 'required|max_length[255]'
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


        /*
        |--------------------------------------------------------------------------
        | DATA EVENT
        |--------------------------------------------------------------------------
        */

        $data = [

            'category_id' =>
                (int) $this->request->getPost('category_id'),

            'title' =>
                trim($this->request->getPost('title')),

            'slug' =>
                trim($this->request->getPost('slug')),

            'description' =>
                $this->request->getPost('description'),

            'date_start' =>
                $this->request->getPost('date_start'),

            'date_end' =>
                $this->request->getPost('date_end'),

            'time_start' =>
                $this->request->getPost('time_start'),

            'time_end' =>
                $this->request->getPost('time_end'),

            'location_name' =>
                trim($this->request->getPost('location_name')),

            'address' =>
                $this->request->getPost('address'),

            'latitude' =>
                $this->request->getPost('latitude'),

            'longitude' =>
                $this->request->getPost('longitude'),

            'price' =>
                $this->request->getPost('price') !== ''
                    ? (int) $this->request->getPost('price')
                    : 0,

            'registration_url' =>
                trim($this->request->getPost('registration_url')),

            'organizer_name' =>
                trim($this->request->getPost('organizer_name')),

            'organizer_contact' =>
                trim($this->request->getPost('organizer_contact')),

            'status' =>
                $this->request->getPost('status') ?: 'draft',

            'is_partner' =>
                $this->request->getPost('is_partner')
                    ? 1
                    : 0,
        ];


        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR BARU
        |--------------------------------------------------------------------------
        */

        $image = $this->request->getFile('image');


        if (
            $image &&
            $image->isValid() &&
            !$image->hasMoved()
        ) {

            $uploadPath =
                FCPATH . 'uploads/events/';


            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }


            $newName =
                $image->getRandomName();


            $image->move(
                $uploadPath,
                $newName
            );


            $data['image'] =
                'uploads/events/' . $newName;


            /*
            |--------------------------------------------------------------------------
            | HAPUS GAMBAR LAMA
            |--------------------------------------------------------------------------
            */

            if (!empty($event['image'])) {

                $oldImage =
                    FCPATH . $event['image'];


                if (is_file($oldImage)) {
                    unlink($oldImage);
                }
            }
        }


        $this->eventModel->update(
            $id,
            $data
        );


        return redirect()
            ->to('/admin/events')
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
                ->to('/admin/events')
                ->with(
                    'error',
                    'Event tidak ditemukan.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS GAMBAR
        |--------------------------------------------------------------------------
        */

        if (!empty($event['image'])) {

            $imagePath =
                FCPATH . $event['image'];


            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS EVENT
        |--------------------------------------------------------------------------
        */

        $this->eventModel->delete($id);


        return redirect()
            ->to('/admin/events')
            ->with(
                'success',
                'Event berhasil dihapus.'
            );
    }
}