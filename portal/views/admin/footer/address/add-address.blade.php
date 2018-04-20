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
            <form class="form-horizontal" action="{{url('/admin/new-address')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                    <label for="floor_number" class="col-sm-2 control-label">Add Floor Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="floor_number" id="tetxt" placeholder="Example : 4th Floor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="street_number" class="col-sm-2 control-label">Add Street Number</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="street_number" id="tetxt" placeholder="Example : 15 Bonhill Street">
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">Add City </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="city" id="tetxt" placeholder="Add City">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="country" class="col-sm-2 control-label">Add Country </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="country" id="tetxt" placeholder="Add Country">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">Add Cell/Phone </label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="phone" id="tetxt" placeholder="Add Cell/Phone">
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
                <button type="submit" class="btn btn-info pull-right">Add New Address </button>
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
 