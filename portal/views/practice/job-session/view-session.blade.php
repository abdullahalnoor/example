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
                <a href="#" class="list-group-item active ">1.Added Session </a>
            </div>
             <div class="col-md-3">
                <a href="#" class="list-group-item ">2.Add Session Information </a>
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
         <h3>Added sessions(2) - The Acorn Gaumont House Survey</h3>
       </div>     
      </div>
     
      <div class="row">      
       <div class="col-md-12">
        <table class="text-center table table-responsive">
           @php($addSession = Session::get('addSession'))
            @php($billableHours = Session::get('billableHours'))
            @php($billableMinute = Session::get('billableMinute'))
            @php($total = Session::get('total'))
          <tr>
            <th></th>
            <th>{{ $addSession['start_date']}}</th>
            <th>Unpaid Break </th>
            <th>Billable Hours</th>
            <th>Hourly Rate</th>
            <th>Total Cost</th>
            <th>Action</th>
          </tr>
          <tr >
            <td id="hours"></td>
            <td>{{ $addSession['start_time']}}-{{ $addSession['end_time']}}</td>
            <td>{{$addSession['unpaid_break_hr']}}: {{$addSession['unpaid_break_min']}}</td>
            <td>{{$billableHours}} : {{$billableMinute}}</td>
            <td>${{ $addSession['hourly_rate']}}</td>
            <td>{{$total}}</td>
            <td>
              <!-- <a href="" class="btn btn-warning">DELETE</a> -->
              <a href="{{url('practice/add-job-session')}}" class="btn btn-default">Edit</a>
            </td>
          </tr>
        </table>
       </div>     
      </div>
      <br>
     
     
      <div class="row">
        <div class="col-md-12">
          <a href="{{url('practice/add-job-session')}}" class="btn btn-warning">Back</a>   
          <a href="{{url('practice/view-job-session-info')}}" class="btn btn-primary pull-right">Next</a>      
          <!-- <a href="" class="btn btn-default pull-right">Add More Session</a> -->
        </div>
      </div>



    </div>

    </section>
    <!-- /.content -->
  </div>


@endsection
@section('js')
<script>

$(document).ready(function(){
              $(document).on('change',function(){
                
                var hours = 0;
                var subTotal = 0;
                var start = $('#start_time').val();
                var end = $('#end_time').val();
                // var hr = calculateTime(start,end);
                var startTime=moment(start, "HH:mm:ss a");
                var endTime=moment(end, "HH:mm:ss a");
                var duration = moment.duration(endTime.diff(startTime));
                var hours = parseInt(duration.asHours());
                var minutes = parseInt(duration.asMinutes())-hours*60;
                // alert (hours + ' hour and '+ minutes+' minutes.');
                $('#hours').text(hours + ' : '+ minutes);
                alert(hours);
                console.log(hours);
                // var hrPerMin = hours * 60 ;
                // var totalMin = hrPerMin + minutes;

                //  costPerMin =  80 /  60  ;
                //  subTotal = costPerMin * totalMin;

                // $('#subTotal').text('$ ' + subTotal);

            });
            
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