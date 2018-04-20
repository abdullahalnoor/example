@extends('admin.master')

@section('content')
 <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Contact Info</h3>
            </div>
            <!-- /.box-header -->
            @if($success = Session::get('success'))
            <h3 class="text-center">{{ $success }}</h3>
            @endif
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/admin/new-contact')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                    <label for="number" class="col-sm-2 control-label">Add Number</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="number" id="number" placeholder="Add Number">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Add Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" placeholder=" Add Email">
                    </div>
                </div>            
                 <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Publication Status</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="status">
                        <option>--Select Publication Status--</option>
                        <option value="0">Unpublished</option>
                        <option value="1">Published</option>
                      </select>
                    </div>
                  </div>                                       
                 </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-warning">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Add New Contact </button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
 