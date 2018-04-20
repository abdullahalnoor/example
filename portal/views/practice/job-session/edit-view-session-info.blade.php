@extends('practice.master')

@section('content')

	 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ Auth()->guard('practice')->user()->first_name }}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content-header">
      <div class="row">      
        <div class="list-group list-group-horizontal">
            <div class="col-md-3">
                <a href="#" class="list-group-item  ">1.Added Session </a>
            </div>
             <div class="col-md-3">
                <a href="#" class="list-group-item active ">2.Add Session Information </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="list-group-item ">3.Priority Access </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="list-group-item ">4.Review & Publish </a>
            </div>
        </div>     
    
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">      
       <div class="alert alert-succes">
         <h3>Added sessions information - The Acorn Gaumont House Survey</h3>
         
       </div>     
      </div>
    
      <div class="row">      
       <div class="col-md-5">
        
          <div class="row">
          <div class="col-sm-12">
            <p><strong>NHS Pension: </strong><span>Rate is inclusive of NHS pension <a href="">CHANGE IN SETTINGS</a></span></p>
            
          </div>
        </div><br><br>
    <form id="session-info-submit" action="{{url('practice/store-edit-job-session-view')}}" method="POST">
      {{csrf_field()}}
      <div class="row">      
       <div class="col-md-12">
        
        <div class="row">
          <div class="col-xs-12">
            <p><strong>Will There be another doctor available in this site ?   </strong></p>
          </div>
        </div><br>
         <div class="row">
          <div class="col-xs-6">
              <div class="radio">
                <label><input type="radio" name="doctor" value="1"  @if(old('doctor') ==  1) checked="checked" @endif >YES</label>
                 @if ($errors->has('doctor'))
                <span class="text-danger">{{ $errors->first('doctor') }}</span>
              @endif 
              </div>
          </div>
          <div class="col-xs-6">
          <div class="radio">
                <label><input type="radio" name="doctor" value="0" @if(old('doctor') ==  0) checked="checked" @endif >NO</label>
                 @if ($errors->has('doctor'))
                <span class="text-danger">{{ $errors->first('doctor') }}</span>
                  @endif 
              </div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-12">
           <p><strong> Will There be nurse support in this session ?</strong></p>
          </div>
        </div><br>
         <div class="row">
          <div class="col-xs-6">
              <div class="radio">
                <label><input type="radio" name="nurse" value="0" @if(old('nurse') ==  0) checked="checked" @endif>NO</label>
              </div>
          </div>
          <div class="col-xs-6">
          <div class="radio">
                <label><input type="radio" name="nurse" value="1" @if(old('nurse') ==  1) checked="checked" @endif >YES</label>
              </div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-12">
           <strong>Duration of each patient appointment</strong>
          </div>
        </div><br>
         <div class="row">
          <div class="col-xs-6">
            <input type="number" name="time" value="{{ $jobSession->time }}">
            @if ($errors->has('time'))
                <span class="text-danger"><strong></strong></span>
                  @endif 
          </div>
          <div class="col-xs-6">
            <p>minutes per appointment</p>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-12">
            <strong>Are there any cath-up slots ?</strong>
          </div>
        </div><br>
         <div class="row">
          <div class="col-xs-6">
              <div class="radio">
                <label><input type="radio" name="slot" value="1" @if(old('slot') ==  1) checked="checked" @endif >YES</label>
              </div>
          </div>
          <div class="col-xs-6">
          <div class="radio">
                <label><input type="radio" name="slot" value="0"  @if(old('slot') ==  0) checked="checked" @endif >NO</label>
              </div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-12">
            <strong>What are the session requirements ?</strong><br>
            <small>Please check all that you require your lucum to cover</small>
          </div>
        </div><br>
         <div class="row">
          <div class="col-xs-4">
            <input type="checkbox" name="home" value="1" {{ (! empty(old('home')) ? 'checked' : '') }} > Home-visits
          </div>
          <div class="col-xs-4">
            <input type="checkbox" name="telephone" value="1" {{ (! empty(old('telephone')) ? 'checked' : '') }}> Telephone triage
          </div>
           <div class="col-xs-4">
            <input type="checkbox" name="practice" value="1" {{ (! empty(old('practice')) ? 'checked' : '') }} > Practice admin
          </div>
        </div><br><br>

        <div class="row">
          <div class="col-xs-12">
           <strong> Add Title</strong>
          </div>
        </div><br>
         <div class="row">
          <div class="col-xs-12">
             <input type="text" class="form-control" name="title" id="title" placeholder=" Title.." value="{{ $jobSession->title }}">
             @if ($errors->has('title'))
                <span class="text-danger"><strong>{{ $errors->first('title') }}</strong></span>
                  @endif 
          </div>
          
        </div><br><br>
        
        <div class="row">
          <div class="col-xs-12">
            <strong>Usefull Information</strong><br>
            <strong class="text-danger">We recomend you add as much detail as possible when writting the description as this increses of chances of finding a GP</strong>
          </div>
        </div><br>
         <div class="row">
          <div class="col-xs-12">
            <textarea name="description" id="mytextarea" class="form-control" rows="10">{{  $jobSession->description }}</textarea>
             @if ($errors->has('description'))
                <span class="text-danger"><strong>{{ $errors->first('description') }}</strong></span>
                  @endif 
            <br><br>
          <p><strong>NHS Pension : </strong>Rate is inclusive of NHS pension 
            <span><a href="">CHANGE IN SETTING</a></span></p>

          </div>
        </div>

       </div>     
      
    </div>
</form>
       </div>
       <div class="col-md-7"></div>

      </div>
      <br>
     
     
      <div class="row">
        <div class="col-md-12">
          <a href="{{url('practice/edit-view-job-session')}}"  class="btn btn-warning">Back</a>
          <a href="{{url('practice/store-edit-job-session-view')}}" class="btn btn-success pull-right" onclick="event.preventDefault();
                document.getElementById('session-info-submit').submit();">Next</a>

        </div>
      </div>
</section>
 


    </div>

    <!-- /.content -->




@endsection
@section('js')
  <script src="{{asset('/tinymce/tinymce.min.js')}}"></script>

<script>

  tinymce.init({
    selector: '#mytextarea',
     menubar: false,
     skin: 'lightgray',
      browser_spellcheck: true,
   contextmenu: false,
   plugins: 'spellchecker',
  
  });

$('.dp6').datepicker('show')
  .on('changeDate', function(ev){
    if (ev.date.valueOf() < startDate.valueOf()){
      $.fn.datepicker.dates['en'] = {
    days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
    daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
    daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
    months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
    monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
};
    }
  });


</script>
@endsection