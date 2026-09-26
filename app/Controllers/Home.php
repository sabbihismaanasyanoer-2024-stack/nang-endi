<?php

namespace App\Controllers;

use App\Models\EventModel;

class Home extends BaseController
{
    public function index(): string
    {
        $eventModel = new EventModel();

        $data = [
            'events' => $eventModel
                ->orderBy('date_start', 'ASC')
                ->findAll(),
        ];

        return view('home', $data);
    }
}