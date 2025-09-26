@extends('layouts.app')

@section('content')
<h2>Create Apartment</h2>

<form action="{{ route('apartments.store') }}" method="POST">
    @csrf
    @include('apartments.form')
    <button type="submit">Save</button>
</form>
@endsection
