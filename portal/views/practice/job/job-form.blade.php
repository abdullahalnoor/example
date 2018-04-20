@extends('practice.master')


@section('content')
<!-- <div class="container-fluid " id="registration">
	<div class="jumbotron">
	  	<h3>Add a New Job</h3> 	
	  	<form id="regForm" class="form-horizontal" action="{{url('/new-post-job')}}" method="POST">
	  		{{ csrf_field() }}
		  <div class="form-group">
		    <label class="control-label col-sm-3" for="title">Post Title:</label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" name="title" placeholder="Enter title">
		      <span>
				 @if ($errors->has('title'))
	                    <span>
	                        <strong>{{ $errors->first('title') }}</strong>
	                    </span>
	              @endif
		      </span>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-3" for="name">Company Name:</label>
		    <div class="col-sm-9"> 
		      <input type="text" class="form-control" name="name"  placeholder="Enter Company Name">
		        <span>
				 @if ($errors->has('name'))
	                    <span>
	                        <strong>{{ $errors->first('name') }}</strong>
	                    </span>
	              @endif
		      </span>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-3" for="url">Comany Web Url:</label>
		    <div class="col-sm-9"> 
		      <input type="text" class="form-control" name="url"  placeholder="Enter Comapny url">
		        <span>
				 @if ($errors->has('url'))
	                    <span>
	                        <strong>{{ $errors->first('url') }}</strong>
	                    </span>
	              @endif
		      </span>
		    </div>
		  </div>
		   <div class="form-group">
		    <label class="control-label col-sm-3" for="address">Comany  address:</label>
		    <div class="col-sm-9"> 
		      <input type="text" class="form-control" name="address"  placeholder="Enter Comany  address">
		        <span>
				 @if ($errors->has('address'))
	                    <span>
	                        <strong>{{ $errors->first('address') }}</strong>
	                    </span>
	              @endif
		      </span>
		    </div>
		  </div>
		  <div class="form-group">
		    <label class="control-label col-sm-3" for="description">Post Description:</label>
		    <div class="col-sm-9"> 
		    	<textarea  class="form-control " name="description"  ></textarea>
		        <span>
				 @if ($errors->has('description'))
	                    <span>
	                        <strong>{{ $errors->first('description') }}</strong>
	                    </span>
	              @endif
		      </span>
		    </div>
		  </div>
		  <div class="form-group"> 
		    <label class="control-label col-sm-3" for="description"></label>

		    <div class=" col-sm-9">
		      <input type="submit" name="btn" class="btn btn-success btn-block" value="Create Post"> 
		    </div>
		  </div>
		</form>
 	</div>  
</div> -->
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
                      <input type="text" class="form-control" name="title" id="title" placeholder=" Title..">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Company Name:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" placeholder="Company Name..">
                    </div>
                  </div> 
                   <div class="form-group">
                    <label for="url" class="col-sm-2 control-label"> Comany Web Url:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="url" id="url" placeholder=" Comany Web Url..">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="address" class="col-sm-2 control-label"> Comany  address:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="address" id="address" placeholder="Comany  Address..">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Job Description:</label>
                    <div class="col-sm-10">
                    	<textarea class="form-control" name="description" id="mytextarea" placeholder=" Description.."></textarea>
                    </div>
                  </div>    
                          
             

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-warning">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Post Job </button>
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
    selector: '#mytextarea',
     menubar: false,
     skin: 'lightgray',
      browser_spellcheck: true,
 	 contextmenu: false,
 	 plugins: 'spellchecker',
 	
  });
  </script>

@endsection