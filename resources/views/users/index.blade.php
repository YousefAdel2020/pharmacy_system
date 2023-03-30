@extends('layouts.adminlte')



@section('title', 'Users Page')

@section('content')
    <div class="text-center">
        <a href="{{route('users.create')}}" class="mt-4 btn btn-success">Create User</a>
    </div>
    <table  id="myTable" class="table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">is_insured</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>shehab</td>
                <td>shehab@gmail.com</td>
                <td>true</td>
            </tr>
            <tr>
                <td>2</td>
                <td>omar</td>
                <td>shehab@gmail.com</td>
                <td>false</td>
            </tr>
        </tbody>
            
    </table>
    
    


    
@endsection

@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
        $('#myTable').DataTable({
            "paging":   true,
            "ordering": true,
            "info":     true
        });
    });
</script>
@endsection


















