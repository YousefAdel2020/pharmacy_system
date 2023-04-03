@extends('layouts.adminlte')

@section('title', 'Doctor')

@section('content')

<div class="container">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="main-breadcrumb pt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('pharmacies.index')}}">Pharmacies</a></li>
            <li class="breadcrumb-item active" aria-current="page">pharmacy Profile</li>
        </ol>
    </nav>
    <!-- /Breadcrumb -->

    <div class="row">
        <div class="col-sm-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        @if($pharmacy->avatar)
                        <img src="{{ asset( $pharmacy->avatar )}}" alt="pharmacy" class="rounded-circle" width="150">
                        @else
                        <img src="{{ asset( 'storage/avatars/unknown.png' )}}" alt="pharmacy" class="rounded-circle"
                            width="150">
                        @endif
                        <div class="mt-3">
                            <p class="text-secondary mb-2">ID: {{ $pharmacy->id }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                <div class="row">
                        <div class="col-sm-3">
                            <h6>name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">{{ $pharmacy->name}}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6>National ID</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">{{ $pharmacy->national_id }}</div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6>Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">{{ $pharmacy->email }}</div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <h6>Verified</h6>
                        </div>
                        @if($pharmacy->email_verified_at)
                        <div class="col-sm-9 text-secondary">Email is <h6 class="text-success d-inline">Verified</h6>
                            @else
                            <div class="col-sm-9 text-secondary">Email is <h6 class="text-danger d-inline">Not Verified
                                </h6>
                                @endif
                            </div>
                        </div>
                        <hr>
                        
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-primary px-5" href="{{route('paharmacies.edit', $pharmacy->id)}}">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-3">
                <div class="card">

                    <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3">
                            <span>Orders made by <span>{{ $doctor->name }}</span></span>
                        </h6>

                        <table class="table-striped col-12 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created_At</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>New</td>
                                    <td>26-3-2003</td>
                                    <td>
                                        <a href="#" title="Show" class="px-1"><i class="fa-solid fa-eye"></i></a>
                                        <a href="#" title="Edit" class="px-1"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="Delete" class="px-1"><i
                                                class="fa-sharp fa-solid fa-trash black"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>Processing</td>
                                    <td>16-9-2013</td>
                                    <td>
                                        <a href="#" title="Show" class="px-1"><i class="fa-solid fa-eye"></i></a>
                                        <a href="#" title="Edit" class="px-1"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="Delete" class="px-1"><i
                                                class="fa-sharp fa-solid fa-trash black"></i></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>5</td>
                                    <td>Confirmed</td>
                                    <td>3-27-2023</td>
                                    <td>
                                        <a href="#" title="Show" class="px-1"><i class="fa-solid fa-eye"></i></a>
                                        <a href="#" title="Edit" class="px-1"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" title="Delete" class="px-1"><i
                                                class="fa-sharp fa-solid fa-trash black"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('script')
    <script src="https://kit.fontawesome.com/212d832ea4.js" crossorigin="anonymous"></script>
    @endsection