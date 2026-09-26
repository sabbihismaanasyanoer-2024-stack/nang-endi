<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            // EVENT
            [
                'name' => 'Music',
                'type' => 'event',
            ],
            [
                'name' => 'Art & Exhibition',
                'type' => 'event',
            ],
            [
                'name' => 'Food & Culinary',
                'type' => 'event',
            ],
            [
                'name' => 'Culture & Heritage',
                'type' => 'event',
            ],
            [
                'name' => 'Education',
                'type' => 'event',
            ],
            [
                'name' => 'Sport',
                'type' => 'event',
            ],
            [
                'name' => 'Festival',
                'type' => 'event',
            ],
            [
                'name' => 'Community',
                'type' => 'event',
            ],

            // PLACE
            [
                'name' => 'Culture & Heritage',
                'type' => 'place',
            ],
            [
                'name' => 'Food & Culinary',
                'type' => 'place',
            ],
            [
                'name' => 'Cafe & Hangout',
                'type' => 'place',
            ],
            [
                'name' => 'Creative Space',
                'type' => 'place',
            ],
            [
                'name' => 'Outdoor',
                'type' => 'place',
            ],
            [
                'name' => 'Shopping',
                'type' => 'place',
            ],
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}