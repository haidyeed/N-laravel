<?php

namespace App\Services;

use App\Models\Apartment;
use Illuminate\Support\Facades\Session;

class ApartmentService
{
    public function searchApartments($query)
    {
        return Apartment::where('unit_name', 'LIKE', "%$query%")
            ->orWhere('unit_number', 'LIKE', "%$query%")
            ->orWhere('project', 'LIKE', "%$query%")
            ->paginate(20);
    }

}