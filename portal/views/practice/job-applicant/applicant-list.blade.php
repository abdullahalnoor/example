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
              <h3 class="box-title">Your All Posted Jobs</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <h3 class="text-center text-success">
                @if($message = Session::get('success'))
                  {{ $message }}
                @endif
              </h3>
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Job Title</th>
    			        <th>Status</th>
    			        <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($jobs as $job)
                <tr>
                  <td>{{ $job->applicant_name }}</td>
                  <td>{{ $job->job_title }}</td>
                  <td>
                    @if($job->recruit == 1)
                     <a href="#" class="btn btn-success" >Recruited</a>
                    @else
                     <a href="#" class="btn btn-warning" >Pending</a>
                    @endif
                  </td>
                 <td>
                  @if($job->recruit == 1)
                  <a href="{{url('practice/cancel-application/'.$job->id.'/'.$job->job_id)}}" class="btn  btn-danger" title="Published">
                     <span class=" glyphicon glyphicon-circle-arrow-up"></span> Cancel ?
                  </a>
                  @else
                   <a href="{{url('practice/recruit-application/'.$job->id.'/'.$job->job_id)}}" class="btn  btn-primary" title="Unpublished ">
                    <span class=" glyphicon glyphicon-circle-arrow-down"></span> Recruit ?
                  </a>
                  @endif
                  <a href="{{url('practice/applicant-profile/'.$job->applicant_id)}}"  class="btn  btn-info"> Profile</a>

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


@endsection
 