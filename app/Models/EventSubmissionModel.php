<?php

namespace App\Models;

use CodeIgniter\Model;

class EventSubmissionModel extends Model
{
    protected $table = 'event_submissions';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'category_id',
        'title',
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
        'admin_note',
    ];

    protected $useTimestamps = true;
}