<?php

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'category_id',
        'title',
        'slug',
        'description',
        'image',
        'date_start',
        'date_end',
        'time_start',
        'time_end',
        'location_name',
        'address',
        'latitude',
        'longitude',
        'price',
        'registration_url',
        'organizer_name',
        'organizer_contact',
        'status',
        'is_partner',
    ];

    protected $useTimestamps = true;
}