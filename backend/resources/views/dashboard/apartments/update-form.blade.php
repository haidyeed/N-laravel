@extends('dashboard.layout')

@section('content')
<form action="{{ route('dashboard.apartments.update', $apartment->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if($errors->any())
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card-body">
        <div class="row clearfix">

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Unit Name</label>
                    <input required type="text" name="unit_name" max="100" class="form-control"
                           value="{{ old('unit_name', $apartment->unit_name) }}">
                    <x-error-message :error="'unit_name'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Unit Number</label>
                    <input required type="text" name="unit_number" max="20" class="form-control"
                           value="{{ old('unit_number', $apartment->unit_number) }}">
                    <x-error-message :error="'unit_number'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Project</label>
                    <input required type="text" name="project" max="100" class="form-control"
                           value="{{ old('project', $apartment->project) }}">
                    <x-error-message :error="'project'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Floor</label>
                    <input required type="number" name="floor" min="0" class="form-control"
                           value="{{ old('floor', $apartment->floor) }}">
                    <x-error-message :error="'floor'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" max="1000" class="form-control">{{ old('description', $apartment->description) }}</textarea>
                    <x-error-message :error="'description'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Area</label>
                    <input required type="number" name="area" min="0" max="99999999.99" step="any" class="form-control"
                           value="{{ old('area', $apartment->area) }}">
                    <x-error-message :error="'area'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Bed Rooms</label>
                    <input required type="number" name="bedrooms" min="0" class="form-control"
                           value="{{ old('bedrooms', $apartment->bedrooms) }}">
                    <x-error-message :error="'bedrooms'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Bath Rooms</label>
                    <input required type="number" name="bathrooms" min="0" class="form-control"
                           value="{{ old('bathrooms', $apartment->bathrooms) }}">
                    <x-error-message :error="'bathrooms'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Price</label>
                    <input required type="number" name="price" min="0" max="99999999.99" step="any" class="form-control"
                           value="{{ old('price', $apartment->price) }}">
                    <x-error-message :error="'price'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Order</label>
                    <input type="number" name="order" min="0" class="form-control"
                           value="{{ old('order', $apartment->order) }}">
                    <x-error-message :error="'order'" />
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <label class="form-group">
                    <span>Is Available ? &nbsp;&nbsp;</span>
                    <input type="checkbox" name="is_available" value="1" class="custom-switch-input btn-darkmode"
                           {{ old('is_available', $apartment->is_available) ? 'checked' : '' }}>
                    <span class="custom-switch-indicator"></span>
                    <x-error-message :error="'is_available'" />
                </label>
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </div>
    </div>
</form>
@endsection