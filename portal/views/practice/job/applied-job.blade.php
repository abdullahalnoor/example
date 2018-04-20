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
              <!-- <h3 class="box-title">Your job applicants{{ $applicants->count()}} </h3> -->
              <button type="button" class="btn btn-primary">Your job applicants <span class="badge">{{ $applicants->count()}}</span></button>
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
                  <th>Applicant Name</th>
    			        <th>Job Title</th>
    			        <th>Time</th>
    			        
                </tr>
                </thead>
                <tbody>
                  @foreach($applicants as $applicant)
                  <tr>
                    <td><a href="{{url('/applicant-cv-info/'.$applicant-> applicant_id)}}">{{ $applicant->applicant_name }}</a></td>
                    <td>{{ $applicant->job_title }}</td>
                    <td>{{ $applicant->created_at->diffForHumans() }}</td>
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
 