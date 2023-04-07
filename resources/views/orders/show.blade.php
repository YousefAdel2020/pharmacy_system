@extends('layouts.adminlte')


@section('title', 'Show')



@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Show Order Number {{ $order->id }} </h3>
        </div>

        <form>
            <div class="card-body">

                <div class="form-group">
                    <label for="user-name">User Name</label>
                    <input type="text" value="{{ $order->user->name }}" class="form-control" disabled>
                </div>




                <div class="form-group">
                    <label for="user-name">Doctor ID</label>
                    <input type="text" value="{{ $order->doctor->id }}" class="form-control" disabled>
                </div>

                <div class="form-group">
                    <label for="user-name">Status</label>
                    <input type="text" value="{{ $order->status }}" class="form-control" disabled>
                </div>

            </div>

        </form>
    </div>

@endsection
