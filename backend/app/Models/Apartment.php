<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
        'order',
        ];


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }
}
