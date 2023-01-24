@extends('layouts.master')

@section('content')
    @can('vehicle.create')
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mb-2 mr-3">
                    <a type="button" class="btn btn-primary btn-icon-text" href="{{ route('vehicle.create') }}"><i class="ti-plus btn-icon-prepend"></i>Add Vehicle
                    </a>
                </div>
            </div>
        </div>
    @endcan
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Filters</h4>
                    <form class="form-inline filter-form" action="{{route('vehicle.index')}}" method="GET">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" name="name" value="{{request()->input('name')}}" id="inlineFormInputName2" placeholder="Name">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Vehicle</h4>
                    <p class="card-description">
{{--                        Add class <code>.table-hover</code>--}}
                    </p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vehicles as $vehicle)
                                <tr>
                                    <td>{{$vehicle->id}}</td>
                                    <td><img src="{{$vehicle->profile_image_url}}" onerror="profileImgError(this);" alt="image"></td>
                                    <td>{{$vehicle->name}}</td>
                                    <td>{{$vehicle->email}}</td>
                                    <td>{{$vehicle->phone}}</td>
                                    <td><label class="badge badge-{{$vehicle->status->meta['color']}}">{{$vehicle->status->value}}</label></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$vehicles->links()}}
                </div>
            </div>
        </div>
@endsection
