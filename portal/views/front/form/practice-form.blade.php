@extends('front.master')

@section('body')

<div class="container"  style="margin-top: 100px; background-color: #F5F5F5;border-left:   1px solid gainsboro;">
	<div class="row" >
		<div class="alert alert-default" style="background-color: #F5F5F5;border: 1px solid gainsboro;border-radius: 0px;border-left: 0px;">
			<p>Register your Practice</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 text-center" style="background-color: #F5F5F5;border-radius: 0px;margin-top: -20px;">
			<ul>
				<li><a href="{{ url('/practice-ccg-form') }}">Create practice-ccg</a></li>
				<li><a href="{{ url('/practice-it-system-form') }}">Create it-system</a></li>
			</ul>
			<div>
				<h3>Benefits to you</h3>
				
			</div>
			<br>
			<br>
			<div>
				<p>SESSION AUTOFILL</p>
				<span>
					Let your own doctors book their regular sessions directly
				</span>
			</div><br><br><br>
			<div>
				<p>SESSION AUTOFILL</p>
				<span>
					Let your own doctors book their regular sessions directly
				</span>
			</div><br><br><br>
			<div>
				<p>SESSION AUTOFILL</p>
				<span>
					Let your own doctors book their regular sessions directly
				</span>
			</div><br><br><br>
			<div>
				<p>SESSION AUTOFILL</p>
				<span>
					Let your own doctors book their regular sessions directly
				</span>
			</div><br><br><br>
		</div>
		<div class="col-md-9 clearfix" style="background-color: #fff;margin-top: -20px;border: 1px solid gainsboro;border-radius: 0px;border-top: 0px; ">
			<div class="row">
				<div class="col-md-10 ">
					<form action="{{ url('/store/practice-form') }}" method="POST">
				{{ csrf_field()}}
				<div class="col-md-12 col-xs-12">
					<h2>Register your Practice</h2>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="practice_name">Practice Name:</label>
					    <input type="text" name="practice_name" class="form-control" id="practice_name" placeholder="Enter practice name">
					      @if ($errors->has('practice_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('practice_name') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="practice_code">Practice Code:</label>
					    <input type="number" class="form-control" name="practice_code" id="practice_code"  placeholder="Enter practice code">
					      @if ($errors->has('practice_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('practice_code') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="practice_postcode">Practice postcode:</label>
					    <input type="number" class="form-control" name="practice_postcode" id="practice_postcode" placeholder="Enter practice postcode">
					    @if ($errors->has('practice_postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('practice_postcode') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="phone_number">Phone Number:</label>
					    <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone Number">
					    @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="sel1">CCG:</label>
						  <select class="form-control" name="ccg_id">
						    <option>--Select a CCG--</option>
						    @foreach($practiceCcgs as $practiceCcg)
						    <option value="{{$practiceCcg->id}}">{{ $practiceCcg->name }}</option>
						    @endforeach
						  </select>
						   @if ($errors->has('ccg_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ccg_id') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="email">It Systems:</label>

					   <div class="row">
					   	<div class="col-xs-12 form" style="">
							<div class="checkbox" style="border: 1px solid gainsboro;padding: 10px;height: 150px;overflow: scroll;">
							@foreach($practiceItSystemms as $item)	
							  <label style="width: 170px;">
							  	<input type="checkbox" name="it_system_id[]" value="{{ $item->id}}"> {{ $item->name}}
							  </label>
							  @endforeach
							   @if ($errors->has('it_system_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('it_system_id') }}</strong>
                                    </span>
                          		 @endif
							</div>
					   	</div>
					   <!-- 	<div class="col-xs-6">
					   		 <div class="checkbox">
							  <label><input type="checkbox" value="">Option 1</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">Option 2</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">Option 2</label>
							</div>
							<div class="checkbox">
							  <label><input type="checkbox" value="">Option 2</label>
							</div>
					   	</div> -->
					   </div>
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="first_name">First Name:</label>
					    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
					      @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="last_name">Last Name:</label>
					    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
					     @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="email">Email :</label>
					    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email ">
					     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    <label for="password">Password :</label>
					    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter Password ">
					     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                           @endif
					 </div>
				</div>
				<div class="col-md-12 col-xs-12">
					<h3>Payment Method</h3>
				</div>
				<div class="radio">
					<div class="col-md-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-body row"><br>
								<div class="col-md-3 col-xs-12 text-center">
									SmartPay
								</div>
								<div class="col-md-7 col-xs-12 text-center">
									<b>Pay via BACs/Cheque</b>
									<ul>
										<li>14 day payment terms</li>
										<li>One invoice, weekly</li>
									</ul>
								</div><br>
								<div class="col-md-2 col-xs-12 text-center">
									<input type="radio" name="payment_type" value="0"><br>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xs-12">
						<div class="panel panel-default">
							<div class="panel-body row"><br>
								<div class="col-md-3 col-xs-12 text-center">
									SmartPay<sup class="tex-success">+</sup>
								</div>
								<div class="col-md-7 col-xs-12 text-center">
									<b>Pay via Direct Debit</b>
									<ul>
										<li>Automated payment</li>
										<li>One invoice, weekly</li>
									</ul>
								</div><br>
								<div class="col-md-2 col-xs-12 text-center">
									<input type="radio" name="payment_type" value="1"><br>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-xs-12">
					<span>
						<input type="checkbox" value=""></label>
					</span>
					I agree with the <a href="">Terms and Conditions</a> and <a href="">Privacy Policy</a> of SourceLantum
				</div><br><br>
				<div class="col-md-12 col-xs-12 text-center">
					<input type="submit" name="create" value="-> SET UP SUMMARY" class="btn btn-success"><br><br>
					Already registered with Lantum?<a href="">Login Here</a><br><br><br>
				</div>

			</form>
				</div>
			</div>
			
		</div>

	</div>
</div>

@endsection