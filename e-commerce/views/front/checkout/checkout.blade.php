@extends('front.master')
@section('content')
    <div class="men">
        <div class="container">
            <div class="col-md-12 register">
                <h3 class="text-center text-success">Welcome to checkout process. You have to login to complete your valuable order. If you are not registered then please register first. Thanks.</h3>
                <hr/>
                <h1>{{ Session::get('message') }}</h1>
            </div>
            <div class="col-md-12 register">
                <form action="{{ url('/customer-login') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="register-top-grid">
                        <h1 class="text-center">Login Form Here</h1>
                        <hr/>
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div>
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </form>
            </div>
            <br/>
            <hr/>
            <br/>
            <div class="col-md-12 register">
                <br/><br/>
                <form action="{{ url('/new-customer') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="register-top-grid">
                        <h1 class="text-center">Registration From Here</h1>
                        <br/><br/><br/>
                        <div>
                            <span>First Name<label>*</label></span>
                            <input type="text" name="first_name">
                            <span>{{ $errors->has('first_name') ? $errors->first('first_name') : ' ' }}</span>
                        </div>
                        <div>
                            <span>Last Name<label>*</label></span>
                            <input type="text" name="last_name">
                            <span>{{ $errors->has('last_name') ? $errors->first('last_name') : ' ' }}</span>
                        </div>
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="email" name="email" class="form-control">
                            <span>{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                        </div>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" name="password" class="form-control">
                            <span>{{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                        </div>
                        <div>
                            <span>Phone Number<label>*</label></span>
                            <input type="number" name="phone_number" class="form-control">
                            <span>{{ $errors->has('phone_number') ? $errors->first('phone_number') : ' ' }}</span>
                        </div>
                        <div>
                            <span>Address<label>*</label></span>
                            <textarea name="address" class="form-control"></textarea>
                            <span>{{ $errors->has('address') ? $errors->first('address') : ' ' }}</span>
                        </div>
                        <div>
                            <input type="submit" value="Register" class="btn btn-success">
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </form>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection