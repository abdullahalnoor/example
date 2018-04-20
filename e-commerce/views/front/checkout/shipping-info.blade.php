@extends('front.master')
@section('content')
    <div class="men">
        <div class="container">
            <div class="col-md-12 register">
                <h3 class="text-center text-success">Welcome {{ Session::get('customerName') }}. You have to give us product shipping info to complete your valuable order. If your billing info and shipping info are same then just press on save shipping info button.</h3>
                <hr/>
            </div>

            <br/>
            <hr/>
            <br/>
            <div class="col-md-12 register">
                <br/><br/>
                <form action="{{ url('/new-shipping') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="register-top-grid">
                        <h1 class="text-center">Shipping From Here</h1>
                        <br/><br/><br/>
                        <div>
                            <span>Full Name<label>*</label></span>
                            <input type="text" value="{{ $customer->first_name.' '.$customer->last_name }}" name="full_name">
                            <span>{{ $errors->has('first_name') ? $errors->first('first_name') : ' ' }}</span>
                        </div>
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
                            <span>{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                        </div>
                        <div>
                            <span>Phone Number<label>*</label></span>
                            <input type="number" name="phone_number" value="{{ $customer->phone_number }}" class="form-control">
                            <span>{{ $errors->has('phone_number') ? $errors->first('phone_number') : ' ' }}</span>
                        </div>
                        <div>
                            <span>Address<label>*</label></span>
                            <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
                            <span>{{ $errors->has('address') ? $errors->first('address') : ' ' }}</span>
                        </div>
                        <div>
                            <input type="submit" value="Save Shipping Info" class="btn btn-success">
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