<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'order_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'unique'     => true,
            ],

            'event_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'buyer_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],

            'buyer_email' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],

            'buyer_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
            ],

            'quantity' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],

            'ticket_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],

            'total_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],

            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],

            'payment_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'default'    => 'pending',
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
        $this->forge->addKey('event_id');

        $this->forge->createTable('ticket_orders');
    }

    public function down()
    {
        $this->forge->dropTable('ticket_orders');
    }
}