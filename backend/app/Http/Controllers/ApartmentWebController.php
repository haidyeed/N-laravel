<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;
use App\Models\Apartment;
// use File;

class ApartmentWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $apartments = Apartment::paginate(20, ['*'], 'apartmentpage');
        return view('apartments.index', compact('apartments'));
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


        // if (!$request->has('image')) {
        //     $apartment->image = old('image', $apartment->image) /* default img */;
        // } else {
        //     $name = round(microtime(true) * 1000) . '.' . request()->image->getClientOriginalExtension();
        //     request()->image->storeAs('public/apartment_image/', $name);
        //     $apartment->image = 'storage/apartment_image/' . $name;

        // }

        $apartment->save();

        return redirect(route('apartments.index'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     */
    public function update(UpdateApartmentRequest $request)
    {
        $response = false;
        $apartment = Apartment::find($request->id);
        $apartment->unit_name = $request->unit_name;
        $apartment->unit_number = $request->unit_number;
        $apartment->project = $request->project;
        $apartment->description = $request->description;
        $apartment->is_available = (!$request->has('is_available') || $request->is_available == 0) ? 0 : 1;

        // if (!$request->has('image')) {
        //     $apartment->image = old('image', $apartment->image) /* default img */;
        // } else {
        //     $oldImage = old('image', $apartment->image);
        //     $name = round(microtime(true) * 1000) . '.' . request()->image->getClientOriginalExtension();
        //     request()->image->storeAs('public/apartment_image/', $name);
        //     $apartment->image = 'storage/apartment_image/' . $name;
        //     File::delete(public_path($oldImage));
        // }

        $apartment->save();

        $response = true;
        echo json_encode($response);
        exit;
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     */
    public function destroy($id)
    {
        $response = false;
        $apartment = Apartment::find($id);

        if ($apartment) {
        //     $oldImage = $apartment->image ? old('image', $apartment->image) : NULL;

            if ($apartment->delete()) {
                $response = true;
        //         File::delete(public_path($oldImage));
            }
        }
        echo json_encode($response);
        exit;
    }

}