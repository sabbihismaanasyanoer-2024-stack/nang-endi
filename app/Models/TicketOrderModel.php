<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketOrderModel extends Model
{
    protected $table = 'ticket_orders';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'order_code',
        'event_id',
        'buyer_name',
        'buyer_email',
        'buyer_phone',
        'quantity',
        'ticket_price',
        'total_price',
        'payment_method',
        'payment_status',
    ];

    protected $useTimestamps = true;
}