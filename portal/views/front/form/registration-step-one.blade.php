@extends('front.master')

@section('body')

<div class="container-fluid " id="registration">
	<div class="jumbotron">
  	<h3>Get StartedWith Your Free Account</h3>
  	<h4>Sign up in 30 seconds to see our jobs</h4>
  	
  	<form id="regForm" class="form-horizontal" action="{{url('/registration-one/store-info')}}" method="POST">
  		{{ csrf_field() }}
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="email">Email:</label>
	    <div class="col-sm-9">
	      <input type="email" class="form-control" name="email" placeholder="Enter email">
	      <span>
			 @if ($errors->has('email'))
                    <span>
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="first_name">First Name:</label>
	    <div class="col-sm-9"> 
	      <input type="text" class="form-control" name="first_name"  placeholder="Enter First Name">
	        <span>
			 @if ($errors->has('first_name'))
                    <span>
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="last_name">Last Name:</label>
	    <div class="col-sm-9"> 
	      <input type="text" class="form-control" name="last_name"  placeholder="Enter Last Name">
	        <span>
			 @if ($errors->has('last_name'))
                    <span>
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group"> 
	    <div class="col-sm-offset-3 col-sm-9">
	      <input type="submit" name="registration_one" class="btn btn-success btn-block" value="->SIGN UP FOR FREE"> 
	    </div>
	  </div>
	</form>

  		<p>By clicking 'Sign Up for Free' you are agreeing with our
  			 <a href="#">Term<span class="glyphicon glyphicon-edit"></span></a>
  			and
  			 <a href="#">Privacy policy<span class="glyphicon glyphicon-edit"></span></a>
  		</p>
	</div>
</div>

@endsection