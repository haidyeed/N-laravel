@extends('layouts.app')

@section('content')
<h2>Edit Apartment</h2>

<form action="{{ route('apartments.update', $apartment) }}" method="POST">
    @csrf
    @method('PUT')
    @include('apartments.form')
    <button type="submit">Update</button>
</form>
@endsection
