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


        // if (!$request->has('image')) {
        //     $apartment->image = old('image', $apartment->image) /* default img */;
        // } else {
        //     $name = round(microtime(true) * 1000) . '.' . request()->image->getClientOriginalExtension();
        //     request()->image->storeAs('public/apartment_image/', $name);
        //     $apartment->image = 'storage/apartment_image/' . $name;

        // }

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

        // if (!$request->has('image')) {
        //     $apartment->image = old('image', $apartment->image) /* default img */;
        // } else {
        //     $oldImage = old('image', $apartment->image);
        //     $name = round(microtime(true) * 1000) . '.' . request()->image->getClientOriginalExtension();
        //     request()->image->storeAs('public/apartment_image/', $name);
        //     $apartment->image = 'storage/apartment_image/' . $name;
        //     File::delete(public_path($oldImage));
        // }

        $apartment->update($request->validated());
        return response()->json($apartment);
    }

    // DELETE /api/apartments/{id}
    public function destroy($id)
    {
        // $apartment = Apartment::find($id);

        // if ($apartment) {
        //     $oldImage = $apartment->image ? old('image', $apartment->image) : NULL;

        //     if ($apartment->delete()) {
        //         File::delete(public_path($oldImage));
        //     }
        // }

        Apartment::destroy($id);
        return response()->json(['message' => 'Apartment deleted']);
    }

    public function searchApartments($query)
    {
        $apartmentService = new ApartmentService();
        $apartments = $apartmentService->searchApartments($query);
        return response()->json($apartments);
    }
}
