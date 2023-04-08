@extends('layouts.adminlte')

@section('title', 'UserAddress')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Address</h3>
        </div>

        <form action="{{ route('user-address.store') }} " method="POST">
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
                <div class="form-group" data-select2-id="13">
                    <label for="user_id">User Name</label>
                    <select name="user_id" class="form-control " style="width: 100%;" data-select2-id="1" tabindex="-1"
                        aria-hidden="true">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>

                </div>
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
                        <label for="city">Area</label>
                        <select id="city" name="city" class="form-control">

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="building_number">Building Number</label>
                        <input type="number" name="building_number" min="0" class="form-control"
                            id="building_number" placeholder="Enter your floor Number">
                    </div>
                    <div class="form-group col-4">
                        <label for="floor_num">Floor</label>
                        <input type="number" name="floor_num" min="0" class="form-control" id="floor_num"
                            placeholder="Enter your floor Number">
                    </div>
                    <div class="form-group col-4">
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

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var idCountry = this.value;
                $("#city").html('');
                $.ajax({
                    url: '/countries/' + idCountry + '/fetch-areas',
                    type: "GET",


                    success: function(result) {
                        $('#city').html('<option  value="">Select Area</option>');
                        // alert(result[0].name);
                        $.each(result, function(key, value) {
                            $("#city").append(
                                '<option value="' + value.id +
                                '">' +
                                value.name + '</option>');
                        });

                    }
                });
            });
        });
    </script>
@endsection
