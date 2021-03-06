@extends('admin.master')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <!--  <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Lucum Detail Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if($success = Session::get('success'))
                <h3 class="text-success text-center">{{ $success }}</h3>
              @endif
              <table id="example2" class="table table-bordered table-hover">             
              <tr>
                <th>First Name</th>
                <td>{{ $lucum->first_name }}</td>
              </tr>
              <tr>
                <th>Last Name</th>
                <td>{{ $lucum->last_name }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $lucum->email }}</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>{{ $lucum->phone_number }}</td>
              </tr>
              <tr>
                <th>Reference Phone</th>
                <td>{{ $lucum->reference_phone_number }}</td>
              </tr>
              <tr>
                <th>City</th>
                <td>{{ $lucum->city }}</td>
              </tr>
              <tr>
                <th>Address One</th>
                <td>{{ $lucum->address_one }}</td>
              </tr>
              <tr>
                <th>Address Two</th>
                <td>{{ $lucum->address_two }}</td>
              </tr>
              <tr>
                <th>Registration Date </th>
                <td>{{ $lucum->created_at->diffforhumans() }}</td>
              </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- <div class="container-fluid " id="registration">
	<div class="jumbotron">
	  	<h3>Add a New Job</h3> 	
	  	<div class="row">
	  		<div class="col-md-6 col-md-offsest-4">
	  			<h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Name</th>
        <th>Url</th>
        <th>Address</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
     
    </tbody>
  </table>
	  		</div>
	  	</div>
 	</div>  
</div> -->

@endsection
 