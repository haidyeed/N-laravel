<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use Illuminate\Http\Request;
use App\Services\ApartmentService;
use App\Models\Apartment;
// use File;

class ApartmentWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $apartmentService = new ApartmentService();
        $apartments = $apartmentService->searchApartments($search);

        return view('dashboard.apartments.index', compact('apartments'));
    }

    /**
     * Display create apartment form.
     *
     */
    public function create()
    {
        return view('dashboard.apartments.create-form');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     */
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

        return redirect(route('dashboard.apartments.index'));
    }

    
    /**
     * Display update apartment form.
     * @param  int  $id
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('dashboard.apartments.update-form', compact('apartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request 
     * @param  int  $id
     */
    public function update(UpdateApartmentRequest $request,$id)
    {
        $response = false;
        $apartment = Apartment::findOrFail($id);

        // Fill only the validated fields
        $apartment->fill($request->validated());

        // Handle checkbox manually (since unchecked checkboxes don't send data)
        $apartment->is_available = $request->has('is_available');

        // Save only if something changed
        if ($apartment->isDirty()) {
            $apartment->save();
        }

        return redirect()
            ->route('dashboard.apartments.index')
            ->with('success', 'Apartment updated successfully.');

    }



    /**
     * get the specified resource from storage.
     * @param  int  $id
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('dashboard.apartments.show', compact('apartment'));
    }


    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     */
    public function destroy($id)
    {
        $response = false;
        $apartment = Apartment::find($id);

        if ($apartment && $apartment->delete()) {
                $response = true;
        }
        echo json_encode($response);
        exit;
    }

}