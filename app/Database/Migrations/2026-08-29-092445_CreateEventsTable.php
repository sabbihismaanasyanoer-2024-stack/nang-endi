<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEventsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'category_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],

            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],

            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 220,
                'unique'     => true,
            ],

            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'date_start' => [
                'type' => 'DATE',
            ],

            'date_end' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'time_start' => [
                'type' => 'TIME',
                'null' => true,
            ],

            'time_end' => [
                'type' => 'TIME',
                'null' => true,
            ],

            'location_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],

            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'latitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,7',
                'null'       => true,
            ],

            'longitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,7',
                'null'       => true,
            ],

            'price' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,
            ],

            'registration_url' => [
                'type'       => 'VARCHAR',
                'constraint' => 500,
                'null'       => true,
            ],

            'organizer_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],

            'organizer_contact' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected', 'published'],
                'default'    => 'published',
            ],

            'is_partner' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'category_id',
            'categories',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('events');
    }

    public function down()
    {
        $this->forge->dropTable('events');
    }
}