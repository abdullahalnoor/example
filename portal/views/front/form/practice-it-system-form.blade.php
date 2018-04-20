@extends('front.master')

@section('body')

<div class="container-fluid " id="registration">
	<div class="jumbotron">
	  	<h3>Create Practice IT-System Option</h3>
	  	
	  	<form id="regForm" class="form-horizontal" action="{{url('/new/practice-it-system')}}" method="POST">
	  		{{ csrf_field() }}
		  <div class="form-group">
		    <label class="control-label col-sm-3" for="name">IT System Name:</label>
		    <div class="col-sm-9">
		      <input type="name" class="form-control" name="name" placeholder="Enter IT-System Name">
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
		    <div class="col-sm-offset-3 col-sm-9">
		      <input type="submit" name="create" class="btn btn-success btn-block" value="->SIGN UP FOR FREE"> 
		    </div>
		  </div>
		</form>

	</div>
</div>

@endsection