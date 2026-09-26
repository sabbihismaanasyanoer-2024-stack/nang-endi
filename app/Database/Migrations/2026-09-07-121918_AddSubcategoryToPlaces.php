<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSubcategoryToPlaces extends Migration
{
    public function up()
    {
        $this->forge->addColumn('places', [
            'subcategory' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
                'after'      => 'category_id',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('places', 'subcategory');
    }
}