@extends('user.master')

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
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Your CV</h3>
            </div>
            @if($success = Session::get('success'))
              <h3 class="text-success text-center">{{$success}}</h3>
            @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/user-cv/add-cv')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">   
                 <div class="form-group">
                    <label for="career_summary" class="col-sm-2 control-label">Career summary</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="career_summary" id="career_summary" placeholder="Career summary">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="skill" class="col-sm-2 control-label">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="skill" id="skill" placeholder="Skills..">
                    </div>
                  </div> 
                   <div class="form-group">
                    <label for="educational_info" class="col-sm-2 control-label">Educational Information</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="educational_info" id="educational_info" placeholder="Educational Information..">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="personal_info" class="col-sm-2 control-label">Personal Information</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="personal_info" id="personal_info" placeholder="Personal Information..">
                    </div>
                  </div>  
                    <div class="form-group">
                    <label for="file_name" class="col-sm-2 control-label">Upload  CV</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="file_name" id="file_name" >
                    </div>
                  </div>           
               <!--  <div class="form-group">
                  <label class="col-sm-2 control-label">Career summary</label>
                  <div class="col-sm-10">
                    <textarea name="career_summary" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Skills</label>
                  <div class="col-sm-10">
                    <textarea name="skill" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Educational Information</label>
                  <div class="col-sm-10">
                    <textarea name="educational_info" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Personal Information</label>
                  <div class="col-sm-10">
                    <textarea name="personal_info" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div>
                </div> -->

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-warning">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Create CV </button>
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
 