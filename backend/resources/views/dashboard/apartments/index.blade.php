@extends('dashboard.layout')

@section('content')
<!-- Start Page title and tab -->
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center ">
            <div class="header-action">
                <h1 class="page-title">Apartment</h1>
                <ol class="breadcrumb page-breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.apartments.index') }}">Apartments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Apartment</li>
                </ol>
            </div>
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a href="#Apartment-all" class="nav-link active" data-toggle="tab">List View</a></li>
                <li class="nav-item"><a href="#Apartment-grid" class="nav-link" data-toggle="tab">Grid View</a></li>
                <li class="nav-item"><a href="{{ route('dashboard.apartments.create') }}" class="nav-link"><i class="fa fa-plus"></i>Add New</a></li>
            </ul>

            <form method="GET" action="{{ route('dashboard.apartments.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by unit name, number, or project"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
<div class="section-body mt-4">
    <div class="container-fluid">
        <div class="tab-content">
            <div class="tab-pane active" id="Apartment-all">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-hover table-vcenter text-nowrap table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Unit Name</th>
                                    <th>Description</th>
                                    <th>Creating Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($apartments as $apartment)
                                <tr>
                                    <td>
                                        {{$apartment->id}} 
                                    </td>
                                    <td><div class="font-15">{{ $apartment->unit_name }}</div></td>
                                    <td><div class="font-15">{{ mb_substr($apartment->description ,0,20 )}} @if (strlen($apartment->description) > 20)...@endif</div></td>
                                    <td><strong>{{ $apartment->created_at }}</strong></td>
                                    <td>
                                        <a href="{{ route('dashboard.apartments.show', $apartment->id) }}" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('dashboard.apartments.edit', $apartment->id) }}" class="btn btn-icon btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-icon btn-sm js-sweetalert" title="Delete" data-route="/dashboard/apartments/{{ $apartment->id }}"</button><i class="fa fa-trash-o text-danger"></i></button>
                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{$apartments->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="Apartment-grid">
                <div class="row">
                    @forelse($apartments as $apartment)
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body text-center ribbon">
                                <div class="ribbon-box green"><i class="fa fa-star"></i></div>

                                <h5 class="mb-0">{{ $apartment->unit_name }}</h5>
                                <br>
                                <div>created at: {{ $apartment->created_at }}</div>
                            </div>
                        </div>
                    </div>
                    @empty

                    @endforelse
                </div>
                <div class="text-center">
                    {{$apartments->links()}}
                </div>
            </div>

        </div>
    </div>
</div>

@endsection