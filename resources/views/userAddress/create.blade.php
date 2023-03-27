@extends('layouts.adminlte')

@section('title', 'UserAddress')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Address</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('useraddress.store') }} " method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" class="form-control" id="street" name="street" placeholder="Street">
                </div>
                <div class="row">
                    <div class="form-group col-6 ">
                        <label for="country">Country</label>
                        <select id="country" name="country" class="form-control">
                            @foreach ($countries as $country)
                                <option value="{{ $country['country-code'] }}">{{ $country['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6  ">
                        <label for="city">city</label>
                        <select id="city" name="city" class="form-control">
                            @foreach ($cities as $city)
                                {{-- <option value="{{ $city->id }}">{{ $city->name }}</option> --}}
                            @endforeach
                            <option value="1">Cairo</option>
                            <option value="2">Alex</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="floor_num">Floor</label>
                        <input type="number" name="floor_num" min="0" class="form-control" id="floor_num"
                            placeholder="Enter your floor Number">
                    </div>
                    <div class="form-group col-6">
                        <label for="apartment_num">Apartment Number </label>
                        <input type="number" name="apartment_num" min="0" class="form-control" id="apartment_num"
                            placeholder="Enter your apartment Number">
                    </div>
                </div>


                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="primaryAddress" name="is_primary_address">
                    <label class="form-check-label" for="primaryAddress">Make This a Primary Address</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
