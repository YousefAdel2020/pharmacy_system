@extends('layouts.adminlte')

@section('title', 'profile')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@section('content')

<div class="container">
    <div class="row">
        <div class="card rounded-5 col-4 offset-4 mt-5 pb-5 edit-profile">
            @if(isset($userType))
            @if($userType->avatar)
            <img src="{{ asset($userType->avatar) }}" alt="Image" class="my-4 rounded-circle" width="150">
            @else
            <img src="{{ asset('storage/avatars/unknown.png') }}" alt="Image" class="my-4 rounded-circle" width="150">
            @endif
            @else
            <img src="{{ asset('storage/avatars/unknown.png') }}" alt="Image" class="my-4 rounded-circle" width="150">
            @endif
            <div class="mb-2">
                <h6>{{ $role }}</h6>
                <h3>{{ $user->name }}</h3>

            </div>
            <h6>Email: <span>{{ $user->email }}</span></h6>
            <button class="btn btn-dark mt-3 edit-button">Edit Profile</button>
        </div>

        <div class="card rounded-5 col-4 offset-4 mt-5 pb-5 edit-form hidder">
            <form method="POST" action="{{ $myRoute }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    @if(isset($userType))
                    @if($userType->avatar)
                    <img src="{{ asset($userType->avatar) }}" alt="Image" class="my-4 rounded-circle" width="150">
                    @else
                    <img src="{{ asset('storage/avatars/unknown.png') }}" alt="Image" class="my-4 rounded-circle"
                        width="150">
                    @endif
                    @else
                    <img src="{{ asset('storage/avatars/unknown.png') }}" alt="Image" class="my-4 rounded-circle"
                        width="150">
                    @endif
                    <input type="file" name="avatar" class="form-control mt-3">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-user fa-beat"></i></span>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}"
                        required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-envelope fa-beat"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}"
                        required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fa-solid fa-lock fa-beat"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-dark mt-3">Save Changes</button>
                <button type="button" class="btn btn-light mt-3 btn-cancel">Cancel</button>
            </form>
        </div>


    </div>
</div>
@endsection

@section('script')
<script>
    var edit = document.getElementsByClassName("edit-button")[0];
    var cancel = document.getElementsByClassName("btn-cancel")[0];
    var profile = document.getElementsByClassName("edit-profile")[0];
    var form = document.getElementsByClassName("edit-form")[0];
    window.addEventListener('load', function() {
        edit.addEventListener("click", function() {
            profile.classList.toggle("hidder");
            form.classList.toggle("hidder");
        });

        cancel.addEventListener("click", function() {
            profile.classList.toggle("hidder");
            form.classList.toggle("hidder");
        });
    });
</script>


<script src="https://kit.fontawesome.com/212d832ea4.js" crossorigin="anonymous"></script>
@endsection