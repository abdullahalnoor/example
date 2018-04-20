@extends('admin.master')

@section('content')
 <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Community Member</h3>
            </div>
            <!-- /.box-header -->
            @if($success = Session::get('success'))
            <h3 class="text-center">{{ $success }}</h3>
            @endif
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/admin/new-community')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"> Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder=" Enter Name">
                    </div>
                </div>  
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label"> Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" placeholder=" Enter Address">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="country" class="col-sm-2 control-label"> Country</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="country" id="country" placeholder=" Enter Country">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label"> City</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="city" id="city" placeholder=" Enter City">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="speech" class="col-sm-2 control-label"> Speech</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="speech" id="speech" placeholder=" Write Your Speech"></textarea>
                    </div>
                </div> 
                <div class="form-group">
                    <label for="image" class="col-sm-2 control-label"> Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image" id="image" placeholder=" Add Image">
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
                <button type="submit" class="btn btn-info pull-right">Add Member </button>
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
 