@extends('user.master')

@section('content')
 <div class="content-wrapper">
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
                  <th>Job Title</th>
    			        <th>Status</th>
    			        <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($jobs as $job)
                <tr>
                  <td>{{ $job->job_title }}</td>
                  <td>
                    @if($job->recruit == 1)
                     <a href="#" class="btn btn-success" >Recruited</a>
                    @else
                     <a href="#" class="btn btn-warning" >Pending</a>
                    @endif
                  </td>
                 <td>
                 
                  <a href="{{url('user-job/practice-job-detail/'.$job->id)}}"  class="btn  btn-info">Detail</a>

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
 