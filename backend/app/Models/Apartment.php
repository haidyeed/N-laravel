<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_name',
        'unit_number',
        'project',
        'description',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'floor',
        'is_available',
        'image',
    ];
}
