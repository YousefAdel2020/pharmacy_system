@extends('layouts.adminlte')

@section('title', 'Create Area')

@section('content')
    <h1>Create Area</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form role="form" method="POST" action="{{ route('areas.store') }}">
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
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter Name">
                        </div>
                        <div class="form-group  ">
                            <label for="country">Country</label>
                            <select id="country" name="country_id" class="form-control">
                                @foreach ($countries as $country)
                                    <option value="{{ $country['country-code'] }}">{{ $country['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter Address">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection
