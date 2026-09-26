<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'order_id',
        'ticket_type_id',
        'ticket_name',
        'price',
        'quantity',
        'subtotal',
    ];

    protected $useTimestamps = true;
}