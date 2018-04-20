@extends('front.master')
@section('content')
    <div class="men">
        <div class="container">
            <div class="col-md-12 register">
                <h3 class="text-center text-success">Welcome {{ Session::get('customerName') }}. You have to give us product payment info to complete your valuable order.</h3>
                <hr/>
            </div>
            <br/>
            <hr/>
            <br/>
            <div class="col-md-12 register">
                <br/><br/>
                <form action="{{ url('/new-order') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="register-top-grid">
                        <h1 class="text-center">Payment From</h1>
                        <br/><br/><br/>
                        <table class="table table-borderd">
                            <tr>
                                <th>Cash On Delivery</th>
                                <th><input type="radio" name="payment_type" value="Cash On Delivery"/></th>
                            </tr>
                            <tr>
                                <th>BKash</th>
                                <th><input type="radio" name="payment_type" value="BKash"/></th>
                            </tr>
                            <tr>
                                <th>Paypal</th>
                                <th><input type="radio" name="payment_type" value="Paypal"/></th>
                            </tr>
                        </table>
                        <div>
                            <input type="submit" value="Confirm Order" class="btn btn-success">
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