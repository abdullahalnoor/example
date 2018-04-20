@extends('front.master')

@section('body')

<div class="container-fluid" style="background-color:  #ffffff;margin-top: 100px">
  <div class="row">
      <div class="col-md-3 col-md-offset-2">
            <div class="form-group">
              <label for="email">What :</label>
              <input type="email" class="form-control" id="email">
              <span>job title, keywords or company</span>
        </div>
      </div>
      <div class="col-md-3">
            <div class="form-group">
              <label for="email">Where :</label>
              <input type="email" class="form-control" id="email">
              <span>city or postcode</span>
          </div>
      </div>
      <div class="col-md-2">
            <div class="form-group">
              <label for="email"></label>
                <input type="submit" value="Find Jobs" class="btn btn-info btn-block form-control">

            </div>
      </div>
    </div><br>
    <div class="row">
      <div class="col-md-5 col-md-offset-2">
        <div class="">
          <p>
            <span class=" glyphicon glyphicon-open"></span>
            <a href="">Upload your CV</a>
             and easily apply to jobs from <br>any device!
          </p>       
          </div>

            @foreach($sessionInfos as $item)
         <div class="job-box" style="padding: 5px;line-height: 18px;">
          <p style="font-size: 20px;">
            <a style="color: #0000cc" href="{{url('/detail-job-info/'.$item->id)}}">{{ $item->title }}</a>
          </p>
         <a style="color: #0000cc" href="{{url('/detail-job-info/'.$item->id)}}">
          <p>
            {{ substr(strip_tags($item->description),0,100) }} {{ strlen($item->description) >100 ?"...." : "" }}
           
          </p>
          </a>
          <p>{{ $item->created_at->diffForHumans() }}
           
          </p>
          </div>
          @endforeach

        
       

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