@extends('layouts.adminlte')



@section('title', 'Users Page')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-3">
            <div class="col col-lg-4 mr-4 small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{ $users->count() }}</h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <a href="{{ route('users.create') }}">
                        <i class="fas fa-user-plus"></i>
                    </a>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        {{ $dataTable->table() }}
    </div>




@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": false,
                "ordering": false,
                "info": false
            });
        });
    </script>
    {{ $dataTable->scripts() }}
@endsection
