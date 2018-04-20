@extends('front.master')

@section('body')

<div class="container-fluid " id="registration">
	<div class="jumbotron">
  	<h3>
  		@if (session('customerName'))
		      <strong> 
		      	<span>Welcomr Dr</span>
		      	{{ session('customerName') }}
		      </strong> 
		@endif
  	</h3>
  	<h4>There are jobs waiting for you! Signup in 30 seconds to see them.</h4>
  	<form id="regForm" class="form-horizontal" action="{{  route('register')}}" method="POST">
  		{{ csrf_field() }}
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="password">Password:</label>
	    <div class="col-sm-9">
	      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
	      <input type="hidden" name="customerId">
	      <span>
			 @if ($errors->has('password'))
                    <span>
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="gmc_Number">GMC number:</label>
	    <div class="col-sm-9"> 
	      <input type="number" class="form-control" name="gmc_Number" id="gmc_Number" placeholder="Enter GMC number">
	      <span>
			 @if ($errors->has('gmc_Number'))
                    <span>
                        <strong>{{ $errors->first('gmc_Number') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="address_one">Address Line 1:</label>
	    <div class="col-sm-9"> 
	      <input class="form-control" type="text" name="address_one"  placeholder="Enter Your Address one">
	       <span>
			 @if ($errors->has('address_one'))
                    <span>
                        <strong>{{ $errors->first('address_one') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	   <div class="form-group">
	    <label class="control-label col-sm-3" for="address_two">Address Line 2(optional):</label>
	    <div class="col-sm-9"> 
	      <input class="form-control" type="text" name="address_two" placeholder="Enter Your Address Two">
	        <span>
			 @if ($errors->has('address_two'))
                    <span>
                        <strong>{{ $errors->first('address_two') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="city">City:</label>
	    <div class="col-sm-9"> 
	     <input type="text" name="city" placeholder="City"  class="form-control">
	      <span>
			 @if ($errors->has('city'))
                    <span>
                        <strong>{{ $errors->first('city') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="postcode">Postcode:</label>
	    <div class="col-sm-9"> 
	     <input type="number" name="postcode" placeholder="Postcode"  class="form-control">
	      <span>
			 @if ($errors->has('postcode'))
                    <span>
                        <strong>{{ $errors->first('postcode') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="control-label col-sm-3" for="phone_number">Phone Number:</label>
	    <div class="col-sm-9"> 
	     <input type="number" name="phone_number" placeholder="phone number"  class="form-control">
	     <span>
			 @if ($errors->has('phone_number'))
                    <span>
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	   <div class="form-group">
	    <label class="control-label col-sm-3" for="reference_phone_number">Enter refer-a-friend code:</label>
	    <div class="col-sm-9"> 
	     <input type="number" name="reference_phone_number" placeholder="Reference phone number"  class="form-control">
	      <span>
			 @if ($errors->has('reference_phone_number'))
                    <span>
                        <strong>{{ $errors->first('reference_phone_number') }}</strong>
                    </span>
              @endif
	      </span>
	    </div>
	  </div>
	  <div class="form-group"> 
	    <div class="col-sm-offset-3 col-sm-9">
	      <input type="submit" value="->ENTER THE SITE" name="registration_two" class="btn btn-success btn-block"> 
	    </div>
	  </div>
	</form>
	</div>
</div>

@endsection