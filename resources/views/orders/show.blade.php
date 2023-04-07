@extends('layouts.adminlte')


@section('title' , 'Show')



@section('content')

<div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show Order Number {{$order->id}} </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">

                <div class="form-group">
                    <label for="user-name">User Name</label>
                    <input type="text" value="{{$order->user->name}}" class="form-control" disabled>
                </div>
                @if($order->prescription )
                <div class="mb-3 mt-3 col-4 p-0 d-flex">
                <label for="exampleFormControlInput1" class="form-label">Prescription</label>
                    @foreach($order->prescription as $orderPrescription)
                    <img id="exampleFormControlInput1"src="{{url('storage/image/'.$orderPrescription)}}" style="width:200px;height:200px"/>
                    @endforeach
                </div>
                @endif

                
                

                <div class="form-group">
                    <label for="user-name">Doctor ID</label>
                    <input type="text" value="{{$order->doctor->id}}" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label for="user-name">Status</label>
                    <input type="text" value="{{$order->status}}" class="form-control" disabled>
                </div>

            </div>
            <!-- /.card-body -->

        </form>
    </div>

@endsection