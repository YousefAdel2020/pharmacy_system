@extends('layouts.adminlte')

@section('title', 'UserAddress')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Address</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="email" class="form-control" id="street" placeholder="Street">
                </div>
                <div class="row">
                    <div class="form-group col-6 ">
                        <label for="country">Country</label>
                        <select id="country" name="country" class="form-control">
                            @foreach ($cities as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-6  ">
                        <label for="city">city</label>
                        <select id="city" name="city" class="form-control">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="floorNum">Floor</label>
                        <input type="number" class="form-control" id="floorNum" placeholder="Enter your floor Number">
                    </div>
                    <div class="form-group col-6">
                        <label for="apartmentNum">Apartment Number </label>
                        <input type="number" class="form-control" id="apartmentNum"
                            placeholder="Enter your apartment Number">
                    </div>
                </div>


                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="primaryAddress" name="isPrimaryAddress">
                    <label class="form-check-label" for="primaryAddress">Make this a Primary Address</label>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
