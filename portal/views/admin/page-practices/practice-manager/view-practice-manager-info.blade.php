@extends('admin.master')

@section('content')
 <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">What our community says</h3>
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
                  <th>Name</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               @foreach($practiceManager as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td><img src="{{asset($item->image)}}" style="width: 100px;height: 100px;"></td>
                 <td>
                  <a href="{{url('admin/edit-practice-maneger-info/'.$item->id)}}" class="btn btn-xs btn-warning" title="Published">
                    <span class="glyphicon glyphicon-edit"></span>
                  </a>
                  <a href="{{url('admin/view-community-detail/'.$item->id)}}" class="btn btn-xs btn-success" title="Published">
                    <span class="glyphicon glyphicon-eye-open"></span>
                  </a>
                 </td>
                </tr>
                @endforeach
               
                </tbody>
                <tfoot>
                <tr>
                  <td>{{ $practiceManager->links() }}</td>
                </tr>
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
 