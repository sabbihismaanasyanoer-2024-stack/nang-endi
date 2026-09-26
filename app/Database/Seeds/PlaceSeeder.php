<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PlaceSeeder extends Seeder
{
    public function run()
    {
        $categoryModel = $this->db->table('categories');

        $heritage = $categoryModel
            ->where('name', 'Culture & Heritage')
            ->where('type', 'place')
            ->get()
            ->getRowArray();

        $food = $categoryModel
            ->where('name', 'Food & Culinary')
            ->where('type', 'place')
            ->get()
            ->getRowArray();

        $cafe = $categoryModel
            ->where('name', 'Cafe & Hangout')
            ->where('type', 'place')
            ->get()
            ->getRowArray();

        $creative = $categoryModel
            ->where('name', 'Creative Space')
            ->where('type', 'place')
            ->get()
            ->getRowArray();

        $outdoor = $categoryModel
            ->where('name', 'Outdoor')
            ->where('type', 'place')
            ->get()
            ->getRowArray();

        $places = [
            [
                'category_id'   => $heritage['id'],
                'name'          => 'House of Sampoerna',
                'slug'          => 'house-of-sampoerna',
                'description'   => 'Ruang budaya dan museum yang menjadi salah satu destinasi heritage di Surabaya.',
                'image'         => null,
                'address'       => 'Taman Sampoerna No. 6, Krembangan, Surabaya',
                'opening_hours' => '09:00 - 18:00',
                'price'         => 0,
                'latitude'      => -7.2308,
                'longitude'     => 112.7375,
                'phone'         => null,
                'website'       => null,
                'instagram'     => null,
            ],

            [
                'category_id'   => $heritage['id'],
                'name'          => 'Museum Pendidikan Surabaya',
                'slug'          => 'museum-pendidikan-surabaya',
                'description'   => 'Museum yang menghadirkan sejarah perkembangan pendidikan di Surabaya.',
                'image'         => null,
                'address'       => 'Jl. Genteng Kali No. 10, Genteng, Surabaya',
                'opening_hours' => '08:00 - 15:00',
                'price'         => 0,
                'latitude'      => -7.2557,
                'longitude'     => 112.7437,
                'phone'         => null,
                'website'       => null,
                'instagram'     => null,
            ],

            [
                'category_id'   => $heritage['id'],
                'name'          => 'Kawasan Kota Lama Surabaya',
                'slug'          => 'kawasan-kota-lama-surabaya',
                'description'   => 'Kawasan bersejarah Surabaya dengan bangunan kolonial dan berbagai spot kota yang menarik untuk dijelajahi.',
                'image'         => null,
                'address'       => 'Kawasan Jembatan Merah, Surabaya',
                'opening_hours' => '24 Jam',
                'price'         => 0,
                'latitude'      => -7.2362,
                'longitude'     => 112.7382,
                'phone'         => null,
                'website'       => null,
                'instagram'     => null,
            ],

            [
                'category_id'   => $food['id'],
                'name'          => 'Pasar Atom',
                'slug'          => 'pasar-atom',
                'description'   => 'Pusat perdagangan dan kuliner legendaris di kawasan Surabaya Utara.',
                'image'         => null,
                'address'       => 'Jl. Bunguran No. 45, Bongkaran, Surabaya',
                'opening_hours' => '09:00 - 17:00',
                'price'         => 0,
                'latitude'      => -7.2434,
                'longitude'     => 112.7472,
                'phone'         => null,
                'website'       => null,
                'instagram'     => null,
            ],

            [
                'category_id'   => $cafe['id'],
                'name'          => 'Contoh Coffee Space',
                'slug'          => 'contoh-coffee-space',
                'description'   => 'Contoh tempat nongkrong untuk kebutuhan testing fitur NANG ENDI?.',
                'image'         => null,
                'address'       => 'Surabaya',
                'opening_hours' => '08:00 - 22:00',
                'price'         => 25000,
                'latitude'      => -7.2650,
                'longitude'     => 112.7500,
                'phone'         => null,
                'website'       => null,
                'instagram'     => null,
            ],

            [
                'category_id'   => $outdoor['id'],
                'name'          => 'Taman Bungkul',
                'slug'          => 'taman-bungkul',
                'description'   => 'Ruang terbuka publik yang menjadi salah satu tempat ikonik untuk bersantai dan beraktivitas di Surabaya.',
                'image'         => null,
                'address'       => 'Jl. Taman Bungkul, Darmo, Surabaya',
                'opening_hours' => '24 Jam',
                'price'         => 0,
                'latitude'      => -7.2776,
                'longitude'     => 112.7427,
                'phone'         => null,
                'website'       => null,
                'instagram'     => null,
            ],
        ];

        $this->db->table('places')->insertBatch($places);
    }
}