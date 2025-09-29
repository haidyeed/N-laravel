@extends('dashboard.layout')

@section('content')
<form action="{{route('dashboard.apartments.store')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

    @if(isset ($errors) && count($errors) > 0)
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
                    <input required="required" type="text" name="unit_name" max=100 class="form-control">
                    <x-error-message :error="'unit_name'"/>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Unit Number</label>
                    <input required="required" type="text" name="unit_number" max=20 class="form-control">
                    <x-error-message :error="'unit_number'"/>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Project</label>
                    <input required="required" type="text" name="project" max=100 class="form-control">
                    <x-error-message :error="'project'"/>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Floor</label>
                    <input required="required" type="number" name="floor" min=0 class="form-control">
                    <x-error-message :error="'floor'"/>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" max=1000 class="form-control" ></textarea>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Area</label>
                    <input required="required" type="number" name="area" min=0 max=99999999.99 step="any" class="form-control">
                    <x-error-message :error="'area'"/>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Bed Rooms</label>
                    <input required="required"  type="number" name="bedrooms" min=0 class="form-control">
                    <x-error-message :error="'bedrooms'"/>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Bath Rooms</label>
                    <input required="required"  type="number" name="bathrooms" min=0 class="form-control">
                    <x-error-message :error="'bathrooms'"/>
                </div>
            </div>


            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Price</label>
                    <input required="required" type="number" name="price" min=0 max=99999999.99 step="any" class="form-control">
                    <x-error-message :error="'price'"/>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label>Order</label>
                    <input type="number" name="order" min=0 class="form-control">
                    <x-error-message :error="'order'"/>
                </div>
            </div>

            <div class="col-md-6 col-sm-12">
                <label class="form-group">
                    <span>Is Available ? &nbsp &nbsp</span>
                    <input type="checkbox" name="is_available" value=1 class="custom-switch-input btn-darkmode">
                    <span class="custom-switch-indicator"></span>
                    <x-error-message :error="'is_available'"/>
                </label>
            </div>

            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </div>
    </div>
</form>

@endsection
