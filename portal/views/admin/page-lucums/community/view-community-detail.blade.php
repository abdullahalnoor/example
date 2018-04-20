@extends('admin.master')

@section('content')
 <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Community member info detail</h3>
            </div>
            @if($success = Session::get('success'))
            <h3 class="text-center text-success">{{ $success }}</h3>
            @endif
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <th>Name</th>
                  <td>{{ $communityDetail->name }}</td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td>{{ $communityDetail->address }}</td>
                </tr>
                 <tr>
                  <th>Country</th>
                  <td>{{ $communityDetail->country }}</td>
                </tr>
                 <tr>
                  <th>City</th>
                  <td>{{ $communityDetail->city }}</td>
                </tr>
                 <tr>
                  <th>speech</th>
                  <td>{{ $communityDetail->speech }}</td>
                </tr>
                 <tr>
                  <th>Image</th>
                  <td><img src="{{asset( $communityDetail->image )}}" style="width: 100px;height: 100px;"></td>
                </tr>
                 <tr>
                  <th>Publication Status</th>
                  <td>{{ $communityDetail->status == 1 ?'Published':'Unpublished'}}</td>
                </tr>
                <tr>
                  <th></th>
                  <td> <a type="" href="{{url('admin/view-community')}}" class="btn btn-warning">Go Back</a></td>
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


@endsection
 