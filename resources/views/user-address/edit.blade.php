@extends('layouts.adminlte')

@section('title', 'Edit User Address')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Address</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('user-address.update', ['id' => $userAddress->id]) }}" method="POST">
            @csrf
            @method('PUT')
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
                    <input type="text" class="form-control" id="street" name="street" placeholder="Street"
                        value="{{ $userAddress->street }}">
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="country">Country</label>
                        <select id="country" name="country" class="form-control">
                            @foreach ($countries as $country)
                                <option value="{{ $country['country-code'] }}"
                                    {{ $userAddress->country == $country['country-code'] ? 'selected' : '' }}>
                                    {{ $country['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label for="city">Area</label>
                        <select id="city" name="city" class="form-control">
                            <option value="{{ $userAddress->area->id }}" selected>{{ $userAddress->area->name }}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="building_number">Building Number</label>
                        <input type="number" name="building_number" min="0" class="form-control"
                            id="building_number" placeholder="Enter your building Number"
                            value="{{ $userAddress->building_number }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="floor_num">Floor</label>
                        <input type="number" name="floor_num" min="0" class="form-control" id="floor_num"
                            placeholder="Enter your floor Number" value="{{ $userAddress->floor_num }}">
                    </div>
                    <div class="form-group col-4">
                        <label for="apartment_num">Apartment Number </label>
                        <input type="number" name="apartment_num" min="0" class="form-control" id="apartment_num"
                            placeholder="Enter your apartment Number" value="{{ $userAddress->apartment_num }}">
                    </div>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="primaryAddress" name="is_primary_address"
                        {{ $userAddress->is_primary_address ? 'checked' : '' }}>
                    <label class="form-check-label" for="primaryAddress">Make This a Primary Address</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update
                </button>
                <a href="{{ route('user-address.index') }}" class="btn btn-secondary ml-2">Cancel</a>
            </div>
        </form>
    </div>
@endsection
