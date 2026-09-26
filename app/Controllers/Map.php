<?php

namespace App\Controllers;

use App\Models\PlaceModel;

class Map extends BaseController
{
    protected $placeModel;

    public function __construct()
    {
        $this->placeModel = new PlaceModel();
    }

    public function index()
    {
        /*
         * Ambil semua Place yang memiliki
         * latitude dan longitude.
         */
        $places = $this->placeModel
            ->where('latitude IS NOT NULL', null, false)
            ->where('longitude IS NOT NULL', null, false)
            ->findAll();

        /*
         * Ambil koordinat dari URL kalau ada.
         *
         * Contoh:
         * /map?lat=-7.2609640&lng=112.7388620
         */
        $lat = $this->request->getGet('lat');
        $lng = $this->request->getGet('lng');

        return view('map', [
            'places' => $places,
            'lat'    => $lat,
            'lng'    => $lng,
        ]);
    }
}