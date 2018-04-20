@extends('admin.master')

@section('content')
 <div class="content-wrapper">
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Hub Sppeech Info </h3>
            </div>
            <!-- /.box-header -->
            @if($success = Session::get('success'))
            <h3 class="text-center">{{ $success }}</h3>
            @endif
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/admin/new-hub-speech-info')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Add Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Add Name">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Add Description</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" name="description" id="description" placeholder="Write Your Sppeech "></textarea>
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
                <button type="submit" class="btn btn-info pull-right">Add Speech Info   </button>
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
 