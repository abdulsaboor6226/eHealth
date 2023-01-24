{{-- @extends('layouts.master') --}}
@extends('frontend.layouts.main')


@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="../../../../images/faces/face12.jpg" onerror="profileImgError(this);"
                                    alt="profile" class="img-lg rounded-circle mb-3">
                                <div class="mb-3">
                                    <h3>{{ auth()->user()->name }}</h3>
                                </div>
                            </div>
                            
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">Status</span>
                                    <span class="float-right text-muted">Active</span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">Phone</span>
                                    <span class="float-right text-muted">{{auth()->user()->phone}}</span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">Mail</span>
                                    <span class="float-right text-muted">{{auth()->user()->email}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="mt-4 py-2 border-top border-bottom">
                            <ul class="nav profile-navbar">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ti-user"></i>
                                        Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">
                                        <i class="ti-receipt"></i>
                                        Feed
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ti-calendar"></i>
                                        Agenda
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="ti-clip"></i>
                                        Resume
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection