@extends('layouts.adminlte')

@section('title', 'Pharmacy')

@section('content')


    <div class="container ">
        <div class="row justify-content-md-center">
            <div class="col col-lg-4 mr-4 small-box bg-gradient-success">
                <div class="inner">
                    <h3>22</h3>
                    <p>Our Doctors</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a ass="text-center">
                    <a href="{{ route('doctors.index') }}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
            </div>

            <div class="col col-lg-4 small-box bg-primary">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
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


<!--  <table id="pharmacies-table" class="table-striped">
        <thead>
            <tr>
                <th scope="col">Avatar</th>
                <th scope="col">Pharmacy Name</th>
                <th scope="col">Email</th>
                <th scope="col">National-ID</th>
                <th scope="col">Created_At</th>
                <th scope="col">Updated_at</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
      
    </table>--> 
   
    <div class="text-center">
        <a href="{{ route('pharmacies.create') }}" class="m-4 btn btn-success">Add New Pharmacy</a>
    </div>
    {{ $dataTable->table() }}
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
    {{ $dataTable->scripts() }}
  

@endsection
