@extends('layouts.adminlte')

@section('title', 'Pharmacy')

@section('content')


<div class="container ">
  <div class="row justify-content-md-center">
<div class="col col-lg-4 mr-4 small-box bg-gradient-success">
  <div class="inner">
    <h3>22</h3>
    <p>Doctors</p>
  </div>
  <div class="icon">
    <i class="fas fa-user-plus"></i>
  </div>
  <a href="#" class="small-box-footer">
    More info <i class="fas fa-arrow-circle-right"></i>
  </a>
</div>

<div class="col col-lg-4 small-box bg-info">
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

<!--<table >
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>shehab</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>
        <tr>
            <td>omar</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>
        <tr>
            <td>viola</td>
            <td>jrjtrtjtj</td>
            <td>jrrtjrtjrtjtrjrtjtrj</td>
        </tr>

    </tbody>
</table>-->


<table id="myTable" class="table-striped">
    <thead>
        <tr>
            <th scope="col">Avatar</th>
            <th scope="col">Pharmacy Name</th>
            <th scope="col">Email</th>
            <th scope="col">National-ID</th>
            <th scope="col">Created_At</th>
            <th scope="col">Updated_at</th>
           
        </tr>
    </thead>
    <tbody>

        <tr>
            <td><img  alt="Post Image" class="d-block" width="10%"></td>
            <td>Elezaby</td>
            <td>Elezaby@gmail.com</td>
            <td>123456789</td>
            <td>26-3-2003</td>	
            <td>15-6-2023</td>
     
        </tr>
        <tr>
            <td><img  alt="Post Image" class="d-block" width="10%"></td>
            <td>Roshdy</td>
            <td>Roshdy@gmail.com</td>
            <td>123456789</td>
            <td>26-3-2003</td>	
            <td>15-6-2023</td>
            
        </tr>
        <tr>
            <td><img  alt="Post Image" class="d-block" width="10%"></td>
            <td>Eltyby</td>
            <td>Eltyby@gmail.com</td>
            <td>123456789</td>
            <td>26-3-2003</td>	
            <td>15-6-2023</td>
   
        </tr>

    </tbody>
</table>
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