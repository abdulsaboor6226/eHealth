@extends('layouts.master')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Staff</h4>
                <form class="form-sample" action="{{ route('staff.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="phone">Phone</label>
                                <div class="col-sm-9">
                                    <input type="phone" name="phone" placeholder="923012345678" class="form-control" value="{{ old('phone') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="password">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control"
                                        value="{{ old('password') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="status_id">Status ID</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status_id" id="status_id">
                                        @foreach ($status as $id => $value)
                                            <option {{ $id == old('status_id') ? 'Selected' : '' }}
                                                value="{{ $id }}">
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Profile Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="dropify form-control" name="profile_image">
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('admin.create')
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    @endcan
                    <a class="btn btn-light" href="{{ route('staff.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
