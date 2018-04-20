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
                <a href="#" class="list-group-item  ">2.Add Session Information </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="list-group-item ">3.Priority Access </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="list-group-item active ">4.Review & Publish </a>
            </div>
        </div>     
    
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">      
       <div class="alert alert-succes">
         <h3>Review & Publish - The Acorn Gaumont House Survey</h3>
       </div>  
       <hr>   
      </div>
      <div class="row">      
       <div class="col-md-6">
         <div class="alert alert-succes">
          <h4>Session Description</h4>
        <small>10 minutes x 2 catch up in between session + 20 minutes admin at the end of 5-6 hours</small>
       </div> 
        <table class=" table table-responsive">
          @php($sessionInfo = Session::get('sessionInfo'))
          @php($priorityAccess = Session::get('priorityAccess'))
          <tr>
            <th>Other doctor available on-site</th>
          <td>{{ $sessionInfo['doctor'] == 0 ?'NO':'YES'}}</td>
          </tr>
           <tr>
            <th>Nurse Support</th>
            <td>{{ $sessionInfo['nurse'] == 0 ?'NO':'YES'}}</td>
          </tr>
           <tr>
            <th>Duration per patient appointment</th>
            <td>{{ $sessionInfo['time'] }} minutes</td>
          </tr>
           <tr>
            <th>Catch up-slots</th>
            <td>{{ $sessionInfo['slot'] == 0 ?'NO':'YES'}}</td>
          </tr>
           <tr>
            <th>Home-visit</th>
            <td> {{ array_key_exists('home',$sessionInfo)?'YES':'NO'}}</td>
          </tr>
          <tr>
            <th>Telephone triage</th>
            <td>{{ array_key_exists('telephone',$sessionInfo)?'YES':'NO'}}</td>
          </tr>
          <tr>
            <th>Practice admin</th>
            <td>{{  array_key_exists('practice',$sessionInfo)?'YES':'NO'}}</td>
          </tr>
       </table> 
       </div>
      </div>
      <br><br>
      <form id="publish" action="{{url('practice/store')}}" method="POST">
        {{csrf_field()}}

        <input type="number" value="1" name="status" style="display: none;">
      </form>
       <div class="row">
        <div class="col-md-12">
          <a href="{{url('practice/store')}}" class="btn btn-success pull-right" onclick="event.preventDefault();
                document.getElementById('publish').submit();">Publish</a>

          <a href="{{url('practice/view-job-session-priority-access')}}" class="btn btn-default pull-right">Back</a>
        </div>
      </div>
     <br><br>
      <div class="row">      
       <div class="col-md-12">
       
        <table class="text-center table table-responsive">
          <tr>
            <th></th>
            <th>Date $ Time</th>
            <th>Unpaid Break </th>
            <th>Billable Hours</th>
            <th>Hourly Rate</th>
            <th>Total Cost</th>
            <th>action</th>
          </tr>
          <tr >
            <td>Date</td>
            <td>5-10-2018</td>
            <td>30 mins</td>
            <td>5</td>
            <td>$80</td>
            <td>$400</td>
            <td>btn</td>
          </tr>
        </table>
       </div>     
      </div>
      <br>
     
     
     



    </div>

    </section>
    <!-- /.content -->
  </div>


@endsection
@section('js')
<script>
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