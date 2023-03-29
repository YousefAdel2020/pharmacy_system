@extends('layouts.adminlte')



@section('title', 'Users Page')

@section('content')
    <div class="container">
        <div class="text-center">
            <a href="{{route('user.create')}}" class="mt-4 btn btn-success">Create User</a>
        </div>
        <div class="row justify-content-md-center mt-3">
            <div class="col col-lg-4 mr-4 small-box bg-gradient-success">
              <div class="inner">
                <h3>2</h3>
                <p>Users</p>
              </div>
              <div class="icon">
                <a href="{{route('user.create')}}">
                <i class="fas fa-user-plus"></i>
                </a>  
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>      
        </div>
        <table  id="myTable">
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
    </div>
    


    
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


















