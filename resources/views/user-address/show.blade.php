@extends('layouts.adminlte')

@section('title', 'User Address')



@section('content')
    <h1>User Address</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <dl class="dl-horizontal">
                        <dt>User ID:</dt>
                        <dd>{{ $userAddress->user_id }}</dd>

                        <dt>Area:</dt>
                        <dd>{{ $userAddress->area->name }}</dd>

                        <dt>Street Name:</dt>
                        <dd>{{ $userAddress->street_name }}</dd>

                        <dt>Building Number:</dt>
                        <dd>{{ $userAddress->building_number }}</dd>

                        <dt>Floor Number:</dt>
                        <dd>{{ $userAddress->floor_number }}</dd>

                        <dt>Flat Number:</dt>
                        <dd>{{ $userAddress->flat_number }}</dd>

                        <dt>Is Main:</dt>
                        <dd>{{ $userAddress->is_main ? 'Yes' : 'No' }}</dd>

                        <dt>Created At:</dt>
                        <dd>{{ $userAddress->created_at }}</dd>

                        <dt>Updated At:</dt>
                        <dd>{{ $userAddress->updated_at }}</dd>
                    </dl>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('table').DataTable({
                "paging": false,
                "searching": false,
                "ordering": false,
                "info": false,
            });
        });
    </script>
@stop
