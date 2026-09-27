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
            ->orderBy('time_start', 'ASC')
            ->findAll();

        // Pastikan data image tetap tersedia dan format path konsisten
        foreach ($events as &$event) {
            $image = trim($event['image'] ?? '');

            if ($image !== '') {
                $image = str_replace('\\', '/', $image);
                $image = preg_replace('#^/+?#', '', $image);
                $image = preg_replace('#^public/#i', '', $image);
            }

            $event['image'] = $image;
        }

        unset($event);

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

        // Normalisasi path gambar untuk halaman detail
        $image = trim($event['image'] ?? '');

        if ($image !== '') {
            $image = str_replace('\\', '/', $image);
            $image = preg_replace('#^/+?#', '', $image);
            $image = preg_replace('#^public/#i', '', $image);
        }

        $event['image'] = $image;

        return view('events/detail', [
            'event' => $event
        ]);
    }
}