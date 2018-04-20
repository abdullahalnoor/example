@extends('front.master')

@section('body')

<div class="container-fluid" style="background-color:  #ffffff;margin-top: 100px">
  
    <div class="row">
      <div class="col-md-5 col-md-offset-2">
        @if($success = Session::get('success'))
          <h3 class="text-danger">{{ $success }}</h3>
        @endif
         <div class="job-box" style="padding: 5px;line-height: 18px;">
          <p style="font-size: 20px;">
            <a style="color: #0000cc" href="">{{ $job->title}}</a>
          </p>
          <p>
            <a style="color: #0000cc" href="">
          </p>
          <p>
            {!! $job->description !!}
          </p>
          <p>{{ $job->created_at->diffForHumans() }}
          </p>
          <a href="{{url('/user/apply-practice-job/'.$job->id)}}" class="btn btn-info">Apply Job</a>
          </div>
       

      </div>
      <div class="col-md-3">
        <div  style="background: #ebebeb;padding: 10px;">
          <p>
            <span class="glyphicon glyphicon-envelope"></span>
            Get new jobs for this search by email
            My email:
          </p>
              <input type="email" class="form-control" id="email">
          <p>
            <span><input type="checkbox" name=""></span>
             Also get an email with jobs recommended just for me
          </p>
          <input type="submit" value="send me new jobs" class="btn btn-default ">
        </div><br><br>
        
      </div>
  	</div>
</div>

@endsection