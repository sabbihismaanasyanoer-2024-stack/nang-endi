<?php

namespace App\Controllers;

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
     * Halaman utama Explore Places
     */
    public function index()
    {
        return view('places/index');
    }


    /**
     * Halaman Café
     */
    public function cafe()
    {
        // Cari category Café dengan type place
        $cafeCategory = $this->db
            ->table('categories')
            ->where('name', 'Café')
            ->where('type', 'place')
            ->get()
            ->getRowArray();

        $cafes = [];

        $search = trim(
            (string) $this->request->getGet('search')
        );

        $category = strtolower(
            trim(
                (string) $this->request->getGet('category')
            )
        );


        if ($cafeCategory) {

            $builder = $this->placeModel
                ->where(
                    'places.category_id',
                    $cafeCategory['id']
                );


            // ==========================================
            // SEARCH
            // ==========================================

            if ($search !== '') {

                $builder
                    ->groupStart()
                        ->like('places.name', $search)
                        ->orLike('places.address', $search)
                        ->orLike('places.description', $search)
                    ->groupEnd();

            }


            // ==========================================
            // FILTER SUBCATEGORY
            // ==========================================

            if (
                $category !== '' &&
                $category !== 'all'
            ) {

                $subcategory = strtoupper($category);

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


            $cafes = $builder
                ->orderBy('places.name', 'ASC')
                ->findAll();
        }


        return view('places/cafe', [
            'cafes'    => $cafes,
            'search'   => $search,
            'category' => $category
        ]);
    }


    /**
     * Detail Café
     */
    public function cafeDetail($slug)
    {
        $cafeCategory = $this->db
            ->table('categories')
            ->where('name', 'Café')
            ->where('type', 'place')
            ->get()
            ->getRowArray();


        if (!$cafeCategory) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Kategori Café tidak ditemukan.'
            );

        }


        $cafe = $this->placeModel
            ->where(
                'category_id',
                $cafeCategory['id']
            )
            ->where('slug', $slug)
            ->first();


        if (!$cafe) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Café tidak ditemukan.'
            );

        }


        return view('places/cafe-detail', [
            'cafe' => $cafe
        ]);
    }


    /**
     * Halaman Heritage & Culture
     */
    public function heritage()
    {
        $places = [];

        $search = trim(
            (string) $this->request->getGet('search')
        );

        $category = strtolower(
            trim(
                (string) $this->request->getGet('category')
            )
        );


        // ==========================================
        // CULTURE & HERITAGE
        // category_id 9
        // ==========================================

        $builder = $this->placeModel
            ->where('places.category_id', 9);


        // ==========================================
        // SEARCH
        // ==========================================

        if ($search !== '') {

            $builder
                ->groupStart()
                    ->like('places.name', $search)
                    ->orLike('places.address', $search)
                    ->orLike('places.description', $search)
                ->groupEnd();

        }


        // ==========================================
        // FILTER MUSEUM / HERITAGE / CULTURE
        // ==========================================

        if (
            $category !== '' &&
            $category !== 'all'
        ) {

            $subcategory = strtoupper($category);

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


        // ==========================================
        // AMBIL DATA
        // ==========================================

        $places = $builder
            ->orderBy('places.name', 'ASC')
            ->findAll();


        return view('places/heritage', [
            'places'   => $places,
            'search'   => $search,
            'category' => $category
        ]);
    }


    /**
     * Detail Heritage & Culture
     */
    public function heritageDetail($slug)
    {
        // ==========================================
        // AMBIL PLACE
        // Culture & Heritage = category_id 9
        // ==========================================

        $place = $this->placeModel
            ->where('category_id', 9)
            ->where('slug', $slug)
            ->first();


        if (!$place) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Heritage & Culture tidak ditemukan.'
            );

        }


        // ==========================================
        // AMBIL SEMUA SUBCATEGORY PLACE
        // ==========================================

        $subcategories = $this->db
            ->table('place_subcategories')
            ->where('place_id', $place['id'])
            ->orderBy('subcategory', 'ASC')
            ->get()
            ->getResultArray();


        return view('places/heritage-detail', [
            'place'         => $place,
            'subcategories' => $subcategories
        ]);
    }
}