<?php

namespace App\Models;

use CodeIgniter\Model;

class PlaceModel extends Model
{
    protected $table      = 'places';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'category_id',
        'subcategory',
        'name',
        'slug',
        'description',
        'image',
        'address',
        'opening_hours',
        'price',
        'latitude',
        'longitude',
        'phone',
        'website',
        'instagram',
    ];

    protected $useTimestamps = true;
}