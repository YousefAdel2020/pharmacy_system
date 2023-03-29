@extends('layouts.adminlte')



@section('title', 'Users Page')

@section('content')
    <div class="container">
        <div class="text-center">
            <a href="{{ route('users.create') }}" class="mt-4 btn btn-success">Create User</a>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col col-lg-4 mr-4 small-box bg-gradient-success">
                <div class="inner">
                    <h3>2</h3>
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
        <table id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">is_insured</th>
                    <th>Roles</th>
                    <th>operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td scope="col">{{ $user->is_insured == 1 ? 'Insured' : 'Not Insured' }}</td>


                        <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>

                        <td>
                            @can('edit user')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info" title="تعديل"><i
                                        class="las la-pen"></i></a>
                            @endcan

                            @can('delete user ')
                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                    data-user_id="{{ $user->id }}" data-username="{{ $user->name }}" data-toggle="modal"
                                    href="#modaldemo8" title="حذف"><i class="las la-trash"></i></a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>




@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
            });
        });
    </script>
@endsection
