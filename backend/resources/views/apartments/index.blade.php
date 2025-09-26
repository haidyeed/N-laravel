@extends('layouts.app')

@section('content')
<h2>Apartment Listings</h2>

<a href="{{ route('apartments.create') }}">Create New Apartment</a>

<table border="1" cellpadding="8">
    <tr>
        <th>Name</th>
        <th>Unit</th>
        <th>Project</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    @foreach ($apartments as $apartment)
    <tr>
        <td>{{ $apartment->unit_name }}</td>
        <td>{{ $apartment->unit_number }}</td>
        <td>{{ $apartment->project }}</td>
        <td>${{ number_format($apartment->price, 2) }}</td>
        <td>
            <a href="{{ route('apartments.show', $apartment) }}">View</a> |
            <a href="{{ route('apartments.edit', $apartment) }}">Edit</a> |
            <form action="{{ route('apartments.destroy', $apartment) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $apartments->links() }}
@endsection
