<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'order_code',
        'event_id',
        'buyer_name',
        'buyer_email',
        'buyer_phone',
        'subtotal',
        'service_fee',
        'total_amount',
        'payment_method',
        'payment_status',
        'order_status',
    ];

    protected $useTimestamps = true;
}