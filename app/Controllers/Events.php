<?php

namespace App\Controllers;

use App\Models\EventModel;

class Events extends BaseController
{
    public function index()
    {
        $eventModel = new EventModel();

        $events = $eventModel
            ->where('status', 'published')
            ->orderBy('date_start', 'ASC')
            ->findAll();

        return view('events/index', [
            'events' => $events
        ]);
    }

    public function detail($slug)
    {
        $eventModel = new EventModel();

        $event = $eventModel
            ->where('slug', $slug)
            ->where('status', 'published')
            ->first();

        if (!$event) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Event tidak ditemukan.'
            );
        }

        return view('events/detail', [
            'event' => $event
        ]);
    }
}