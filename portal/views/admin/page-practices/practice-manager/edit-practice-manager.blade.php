@extends('admin.master')

@section('content')
 <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Community Member Info</h3>
            </div>
            <!-- /.box-header -->
            @if($success = Session::get('success'))
            <h3 class="text-center">{{ $success }}</h3>
            @endif
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/admin/update-practice-maneger-info')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                  
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label"> Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" value="{{ $practiceManager->name }}">
                      <input type="hidden"  name="id"  value="{{ $practiceManager->id }}">
                    </div>
                </div>  
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label"> Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" value="{{ $practiceManager->address }}">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="country" class="col-sm-2 control-label"> Country</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="country" id="country" value="{{ $practiceManager->country }}">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label"> City</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="city" id="city" value="{{ $practiceManager->city }}">
                    </div>
                </div> 
                <div class="form-group">
                    <label for="speech" class="col-sm-2 control-label"> Speech</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="speech" id="speech" >{{ $practiceManager->speech }}</textarea>
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
               
                <button type="submit" class="btn btn-info pull-right">Update Manager Info </button>
            </form>

                 <a type="" href="{{url('admin/view-practice-maneger-info')}}" class="btn btn-warning">Go Back</a>
              </div>
              <!-- /.box-footer -->
          
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
 