@extends('dashboard.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Apartment Details</h4>
    </div>
    <div class="card-body">
      <strong>Apartment ID:</strong> {{ $apartment->id }}<br><br>
        <ul class="list-group">
            <li class="list-group-item"><strong>Unit Name:</strong> {{ $apartment->unit_name }}</li>
            <li class="list-group-item"><strong>Unit Number:</strong> {{ $apartment->unit_number }}</li>
            <li class="list-group-item"><strong>Project:</strong> {{ $apartment->project }}</li>
            <li class="list-group-item"><strong>Description:</strong> {{ $apartment->description }}</li>
            <li class="list-group-item"><strong>Area:</strong> {{ $apartment->area }}</li>
            <li class="list-group-item"><strong>Floor:</strong> {{ $apartment->floor }}</li>
            <li class="list-group-item"><strong>Bedrooms:</strong> {{ $apartment->bedrooms }}</li>
            <li class="list-group-item"><strong>Bathrooms:</strong> {{ $apartment->bathrooms }}</li>
            <li class="list-group-item"><strong>Price:</strong> {{ number_format($apartment->price, 2) }}</li>
            <li class="list-group-item"><strong>Order:</strong> {{ $apartment->order }}</li>
            <li class="list-group-item"><strong>Available:</strong> {{ $apartment->is_available ? 'Yes' : 'No' }}</li>
        </ul>
    </div>
</div>
@endsection
