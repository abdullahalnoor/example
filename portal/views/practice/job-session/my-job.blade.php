@extends('practice.master')

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
              <h3 class="box-title">My All Posted Jobs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <h3 class="text-center text-success">
                @if($message = Session::get('success'))
                  {{ $message }}
                @endif
              </h3>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Title</th>
    			        <th>Description</th>
    			        <th>Status</th>
    			        <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($jobSession as $job)
                <tr>
                  <td>{{ $job->title }}</td>
                  <td>{{ substr(strip_tags($job->description),0,100) }} {{ strlen($job->description) > 100 ? '...' : ' ' }}</td>
                  <td>{{ $job->status == 1 ?'Published' : 'Unpublished' }}</td>
                 <td>
                  @if($job->status == 1)
                  <a href="{{url('practice/unpublished-my-job/'.$job->id)}}" class="btn btn-xs btn-success" title="Published">
                    <span class=" glyphicon glyphicon-circle-arrow-up"></span>
                  </a>
                  @else
                   <a href="{{url('practice/published-my-job/'.$job->id)}}" class="btn btn-xs btn-warning" title="Unpublished ">
                    <span class=" glyphicon glyphicon-circle-arrow-down"></span>
                  </a>
                  @endif
                  <a href="{{url('practice/delete-my-job/'.$job->id)}}" onclick="return confirm('Do You want to Delete this ??')" class="btn btn-xs btn-danger" title="Delete Post ">
                    <span class="glyphicon glyphicon-trash"></span>
                  </a>
                  <a href="{{url('practice/my-job-detail/'.$job->id)}}" class="btn btn-xs btn-info" title="View Post Detail">
                    <span class="glyphicon glyphicon-eye-open"></span>
                  </a>
                  <a href="{{url('practice/edit-job-session/'.$job->id)}}" class="btn btn-xs btn-warning" title="Edit Post ">
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>
                  
                  <a href="{{url('practice/job-applicant/'.$job->id)}}" class="btn btn-xs btn-info" title="View Applicant Detail">
                    <span class="glyphicon glyphicon-file"></span>
                  </a>
                  
                 </td>
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
               
                </tfoot>
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
 