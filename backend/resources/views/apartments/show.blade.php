@extends('layouts.app')

@section('content')
<h2>{{ $apartment->unit_name }}</h2>

<ul>
    <li>Unit Number: {{ $apartment->unit_number }}</li>
    <li>Project: {{ $apartment->project }}</li>
    <li>Price: ${{ number_format($apartment->price, 2) }}</li>
</ul>

<a href="{{ route('apartments.edit', $apartment) }}">Edit</a>
@endsection