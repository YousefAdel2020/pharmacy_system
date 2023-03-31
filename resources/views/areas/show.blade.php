@extends('layouts.adminlte')

@section('title', 'Area Details')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <h1>{{ $area->name }}</h1>


                        <div class="container ">
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-4 mr-4 small-box bg-gradient-success">
                                    <div class="inner">
                                        <p>Number of Users in {{ $area->name }} </p>
                                        <h3>2200</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <a ass="text-center">
                                        <a href="{{ route('doctors.index') }}" class="small-box-footer">
                                            More info <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                </div>

                                <div class="col col-lg-4 small-box bg-info">
                                    <div class="inner">
                                        <p>Number of Pharmacies in {{ $area->name }} </p>
                                        <h3>150</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <tbody>
                            <h3>Details :</h3>
                            <tr>
                                <th>ID</th>
                                <td>{{ $area->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $area->name }}</td>
                            </tr>
                            <tr>
                            <tr>
                                <th>address</th>
                                <td>{{ $area->address }}</td>
                            </tr>
                            <th>Created At</th>
                            <td>{{ $area->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $area->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop
