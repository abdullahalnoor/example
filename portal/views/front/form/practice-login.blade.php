@extends('front.master')

@section('body')
<div class="container-fluid" id="login">
    <div class="jumbotron">
    <div class="row">
      <div>
                  @if($success = Session::get('success'))
                 <div class="alert alert-success text-center">
                   {{ $success}}
                 </div>   
                  @endif
      </div>
    </div>
        <div class="row">
            <div class="col-md-12">
            <h3>Practice Login Form to Your Account</h3>
                <form id="loginForm" action="{{ url('/practice/practice-login') }}" method="POST">
            {{ csrf_field() }}
                    <div class="form-group">
                        <label>Email Address:</label>
                        <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2">@</span>
                              <input type="text" name="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password :</label>
                        <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2">*</span>
                              <input type="text" name="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
                         </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-info btn-block">
                    </div>
                </form>
            <a href="">Forgetten  Password  ?</a>
            </div>
            <!-- <div class="col-md-6" id="boxBtn">
                <h4>Free Signup</h4>
                <h3>New to SourceLocum?</h3>
                <p>Signup it's fast and easy</p>
                <p>Get started as</p>
                <div class="row" >
                    <div class="col-sm-6">
                        <a href=""  class="btn btn-block btn-success">LOCUM</a>
                    </div>
                    <div class="col-sm-6">
              <a href="{{url('/practice-form')}}"  class="btn btn-block btn-success">PRACTICE</a>
                    </div>
                    
                </div>
            </div> -->
        </div>
        
    </div>
</div>


@endsection