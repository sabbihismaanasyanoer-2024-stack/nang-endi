<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        $categoryModel = $this->db->table('categories');

        $music = $categoryModel
            ->where('name', 'Music')
            ->where('type', 'event')
            ->get()
            ->getRowArray();

        $art = $categoryModel
            ->where('name', 'Art & Exhibition')
            ->where('type', 'event')
            ->get()
            ->getRowArray();

        $food = $categoryModel
            ->where('name', 'Food & Culinary')
            ->where('type', 'event')
            ->get()
            ->getRowArray();

        $culture = $categoryModel
            ->where('name', 'Culture & Heritage')
            ->where('type', 'event')
            ->get()
            ->getRowArray();

        $education = $categoryModel
            ->where('name', 'Education')
            ->where('type', 'event')
            ->get()
            ->getRowArray();

        $festival = $categoryModel
            ->where('name', 'Festival')
            ->where('type', 'event')
            ->get()
            ->getRowArray();

        $community = $categoryModel
            ->where('name', 'Community')
            ->where('type', 'event')
            ->get()
            ->getRowArray();

        $events = [
            [
                'category_id'       => $music['id'],
                'title'             => 'Surabaya Music Showcase',
                'slug'              => 'surabaya-music-showcase',
                'description'       => 'Contoh event musik untuk kebutuhan pengembangan dan pengujian fitur NANG ENDI?.',
                'image'             => null,
                'date_start'        => '2026-09-12',
                'date_end'          => null,
                'time_start'        => '19:00:00',
                'time_end'          => '22:00:00',
                'location_name'     => 'Contoh Creative Venue',
                'address'           => 'Surabaya',
                'latitude'          => -7.2650,
                'longitude'         => 112.7500,
                'price'             => 75000,
                'registration_url'  => null,
                'organizer_name'    => 'NANG ENDI? Demo',
                'organizer_contact' => null,
                'status'            => 'published',
                'is_partner'        => 0,
            ],

            [
                'category_id'       => $art['id'],
                'title'             => 'Surabaya Art Exhibition',
                'slug'              => 'surabaya-art-exhibition',
                'description'       => 'Contoh pameran seni sebagai data dummy untuk pengembangan website NANG ENDI?.',
                'image'             => null,
                'date_start'        => '2026-09-18',
                'date_end'          => '2026-09-27',
                'time_start'        => '10:00:00',
                'time_end'          => '20:00:00',
                'location_name'     => 'Contoh Art Space',
                'address'           => 'Surabaya',
                'latitude'          => -7.2570,
                'longitude'         => 112.7420,
                'price'             => 0,
                'registration_url'  => null,
                'organizer_name'    => 'NANG ENDI? Demo',
                'organizer_contact' => null,
                'status'            => 'published',
                'is_partner'        => 0,
            ],

            [
                'category_id'       => $food['id'],
                'title'             => 'Surabaya Food Weekend',
                'slug'              => 'surabaya-food-weekend',
                'description'       => 'Contoh festival kuliner untuk menguji fitur pencarian dan filter event.',
                'image'             => null,
                'date_start'        => '2026-10-03',
                'date_end'          => '2026-10-04',
                'time_start'        => '11:00:00',
                'time_end'          => '21:00:00',
                'location_name'     => 'Contoh Food Market',
                'address'           => 'Surabaya',
                'latitude'          => -7.2750,
                'longitude'         => 112.7450,
                'price'             => 25000,
                'registration_url'  => null,
                'organizer_name'    => 'NANG ENDI? Demo',
                'organizer_contact' => null,
                'status'            => 'published',
                'is_partner'        => 0,
            ],

            [
                'category_id'       => $culture['id'],
                'title'             => 'Surabaya Heritage Walk',
                'slug'              => 'surabaya-heritage-walk',
                'description'       => 'Contoh kegiatan eksplorasi kawasan heritage Surabaya.',
                'image'             => null,
                'date_start'        => '2026-10-10',
                'date_end'          => null,
                'time_start'        => '08:00:00',
                'time_end'          => '11:00:00',
                'location_name'     => 'Kawasan Kota Lama Surabaya',
                'address'           => 'Surabaya',
                'latitude'          => -7.2362,
                'longitude'         => 112.7382,
                'price'             => 30000,
                'registration_url'  => null,
                'organizer_name'    => 'NANG ENDI? Demo',
                'organizer_contact' => null,
                'status'            => 'published',
                'is_partner'        => 0,
            ],

            [
                'category_id'       => $education['id'],
                'title'             => 'Creative Workshop Surabaya',
                'slug'              => 'creative-workshop-surabaya',
                'description'       => 'Contoh workshop kreatif untuk menguji sistem event NANG ENDI?.',
                'image'             => null,
                'date_start'        => '2026-10-17',
                'date_end'          => null,
                'time_start'        => '13:00:00',
                'time_end'          => '16:00:00',
                'location_name'     => 'Contoh Creative Space',
                'address'           => 'Surabaya',
                'latitude'          => -7.2650,
                'longitude'         => 112.7500,
                'price'             => 50000,
                'registration_url'  => null,
                'organizer_name'    => 'NANG ENDI? Demo',
                'organizer_contact' => null,
                'status'            => 'published',
                'is_partner'        => 0,
            ],

            [
                'category_id'       => $festival['id'],
                'title'             => 'Surabaya City Festival',
                'slug'              => 'surabaya-city-festival',
                'description'       => 'Contoh festival kota untuk pengujian tampilan event unggulan.',
                'image'             => null,
                'date_start'        => '2026-11-07',
                'date_end'          => '2026-11-08',
                'time_start'        => '10:00:00',
                'time_end'          => '22:00:00',
                'location_name'     => 'Contoh City Venue',
                'address'           => 'Surabaya',
                'latitude'          => -7.2600,
                'longitude'         => 112.7480,
                'price'             => 0,
                'registration_url'  => null,
                'organizer_name'    => 'NANG ENDI? Demo',
                'organizer_contact' => null,
                'status'            => 'published',
                'is_partner'        => 0,
            ],

            [
                'category_id'       => $community['id'],
                'title'             => 'Surabaya Community Meetup',
                'slug'              => 'surabaya-community-meetup',
                'description'       => 'Contoh kegiatan komunitas untuk pengujian fitur event dan kalender.',
                'image'             => null,
                'date_start'        => '2026-11-14',
                'date_end'          => null,
                'time_start'        => '15:00:00',
                'time_end'          => '18:00:00',
                'location_name'     => 'Contoh Community Space',
                'address'           => 'Surabaya',
                'latitude'          => -7.2700,
                'longitude'         => 112.7400,
                'price'             => 0,
                'registration_url'  => null,
                'organizer_name'    => 'NANG ENDI? Demo',
                'organizer_contact' => null,
                'status'            => 'published',
                'is_partner'        => 0,
            ],
        ];

        $this->db->table('events')->insertBatch($events);
    }
}