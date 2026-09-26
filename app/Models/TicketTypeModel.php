<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketTypeModel extends Model
{
    protected $table = 'ticket_types';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'event_id',
        'name',
        'description',
        'price',
        'stock',
        'sold',
        'status',
    ];

    protected $useTimestamps = true;
}