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

        foreach ($events as &$event) {
            $event['image_url'] = $this->buildImageUrl(
                $event['image'] ?? ''
            );
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

        $event['image_url'] = $this->buildImageUrl(
            $event['image'] ?? ''
        );

        return view('events/detail', [
            'event' => $event
        ]);
    }

    private function buildImageUrl(string $image): string
    {
        $image = trim($image);

        if ($image === '') {
            return '';
        }

        // Normalisasi slash
        $image = str_replace('\\', '/', $image);

        // Hilangkan public/ jika tersimpan di database
        $image = preg_replace(
            '#^public/#i',
            '',
            $image
        );

        // Hilangkan slash di depan
        $image = ltrim($image, '/');

        // Kalau ternyata sudah berupa URL lengkap
        if (
            str_starts_with($image, 'http://') ||
            str_starts_with($image, 'https://')
        ) {
            return $image;
        }

        return base_url($image);
    }
}