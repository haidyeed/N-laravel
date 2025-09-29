<?php

namespace App\Services;

use App\Models\Apartment;
use Illuminate\Support\Facades\Session;

class ApartmentService
{
    public function searchApartments($search)
    {
        return Apartment::query()
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('unit_name', 'LIKE', "%{$search}%")
                  ->orWhere('unit_number', 'LIKE', "%{$search}%")
                  ->orWhere('project', 'LIKE', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(20);
    }

}