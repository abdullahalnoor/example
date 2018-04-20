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
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Post Your Job</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{url('/new-post-job')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="box-body">   
                 <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Post Title: </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" id="title" value="{{ $job->title}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Company Name:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" value="{{ $job->name}}">
                    </div>
                  </div> 
                   <div class="form-group">
                    <label for="url" class="col-sm-2 control-label"> Comany Web Url:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="url" id="url"  value="{{ $job->url}}">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="address" class="col-sm-2 control-label"> Comany  address:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" value="{{ $job->address}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Job Description:</label>
                    <div class="col-sm-10">
                    	<textarea class="form-control" name="description" id="description" placeholder=" Description..">{{ $job->description}}</textarea>
                    </div>
                  </div>    
                          
             

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-warning">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Update Job </button>
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
@section('js')
		<script src="{{asset('/tinymce/tinymce.min.js')}}"></script>
  <script>
  tinymce.init({
    selector: 'textarea',
     menubar: false,
     skin: 'lightgray',
      browser_spellcheck: true,
 	 contextmenu: false,
 	 plugins: 'spellchecker',
 	
  });
  </script>

@endsection