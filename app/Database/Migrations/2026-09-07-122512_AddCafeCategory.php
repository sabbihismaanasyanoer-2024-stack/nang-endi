<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCafeCategory extends Migration
{
    public function up()
    {
        $this->db->table('categories')->insert([
            'name' => 'Café',
            'type' => 'place',
        ]);
    }

    public function down()
    {
        $this->db->table('categories')
            ->where('name', 'Café')
            ->where('type', 'place')
            ->delete();
    }
}