<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Apartment;
use App\Services\ApartmentService;

// use File;

class ApartmentController extends Controller
{
        // GET /api/apartments
    public function index()
    {
        return Apartment::paginate(20);
    }

    // POST /api/apartments
    public function store(StoreApartmentRequest $request)
    {

        $apartment = new Apartment;
        $apartment->unit_name = $request->unit_name;
        $apartment->unit_number = $request->unit_number;
        $apartment->project = $request->project;
        $apartment->description = $request->description;
        $apartment->price = $request->price;
        $apartment->bedrooms = $request->bedrooms;
        $apartment->bathrooms = $request->bathrooms;
        $apartment->area = $request->area;
        $apartment->floor = $request->floor;
        $apartment->order = $request->order ?? 0;
        $request->is_available ? $apartment->is_available = 1 : $apartment->is_available = 0;


        $apartment->save();

        return response()->json($apartment, 201);
    }

    // GET /api/apartments/{id}
    public function show($id)
    {
        return Apartment::findOrFail($id);
    }

    // PUT /api/apartments/{id}
    public function update(UpdateApartmentRequest $request, $id)
    {
        $apartment = Apartment::findOrFail($id);

        $apartment->update($request->validated());
        return response()->json($apartment);
    }

    // DELETE /api/apartments/{id}
    public function destroy($id)
    {
        Apartment::destroy($id);
        return response()->json(['message' => 'Apartment deleted']);
    }

    public function searchApartments($search)
    {
        $apartmentService = new ApartmentService();
        $apartments = $apartmentService->searchApartments($search);

        if ($apartments->isEmpty()) {
            return response()->json(['message' => 'No apartments found matching your query'], 404);
        }

        return response()->json([
            'message' => 'Apartments found',
            'data' => $apartments
        ], 200);
    }
}
