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
    

    
    <!-- Main content -->
    <section class="content">
      @if($success = Session('success'))
      <h2 class="text-center  text-success">{{ $success }}</h2>
      @endif
       <div class="panel panel-primary">
        <div class="panel-heading" style="font-size: 16px; text-transform: capitalize;">
           <div class="">      
               Add a session - The Acorn Gaumont House Survey
            </div>
        </div>
        <div class="panel-body">
           <form id="session-submit" action="{{url('practice/store-job-session')}}" method="POST">
        {{csrf_field()}}
      <div class="row">      
       <div class="col-md-12 table-responsive">
        <table class="text-center table table-striped  ">
          <tr>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Unpaid Break </th>
            <th>Hourly Rate</th>
          </tr>
          <tr >
            <td style="padding: 10px">
              <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="span2" size="10" > 
              @if ($errors->has('start_date'))
                <span class="text-danger">{{ $errors->first('start_date') }}</span>
              @endif
            </td>
            <td style="padding: 10px">
             <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}"  class="span2" size="10" > 
              @if ($errors->has('start_time'))
                <span class="text-danger">{{ $errors->first('start_time') }}</span>
              @endif
            </td>
            <td style="padding: 10px">
             <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}"  class="span2" size="10" >
              @if ($errors->has('end_time'))
                <span class="text-danger">{{ $errors->first('end_time') }}</span>
              @endif 
            </td>
            <td style="padding: 10px">
               <input type="number" name="unpaid_break_hr" value="{{ old('unpaid_break_hr') }}" id="unpaid_break_hr" min="1" max="2">
               <input type="number" name="unpaid_break_min" value="{{ old('unpaid_break_min') }}"  id="unpaid_break_min" min="1" max="2">
            </td>
            <td style="padding: 10px">
             <input type="number" name="hourly_rate"  value="{{ old('hourly_rate') }}" id="hourly_rate" class="span2" size="10" > 
             @if ($errors->has('hourly_rate'))
                <span class="text-danger">{{ $errors->first('hourly_rate') }}</span>
              @endif 
            </td>
          </tr>
        </table>
       </div>     
      </div>
        </div>
       </div>
     
     <br>
      <div class="row">      
       <div class="col-md-12">
           <div class="panel panel-primary">
              <div class="panel-heading" style="font-size: 16px; text-transform: capitalize;">
                Repeat these session times on more days<br>
               
              </div><br>
              <div class="panel-body">
                <strong><b>Repeat Evereday :</b> </strong>
                 <label class="checkbox-inline">
            <input class="days"  type="checkbox"  name="saturday"  value="6" {{ (! empty(old('saturday')) ? 'checked' : '') }} >Sa
          </label>
          <label class="checkbox-inline">
            <input class="days" type="checkbox" name="sunday" value="0" {{ (! empty(old('sunday')) ? 'checked' : '') }} >Su
          </label>
          <label class="checkbox-inline">
            <input class="days" type="checkbox" name="monday" value="1" {{ (! empty(old('monday')) ? 'checked' : '') }} >M
          </label>
          <label class="checkbox-inline">
            <input class="days" type="checkbox" name="tuesday" value="2" {{! empty(old('tuesday')) ? 'checked' : '' }} >Tu
          </label>
          <label class="checkbox-inline">
            <input class="days" type="checkbox" name="wednesday" value="3" {{ ! empty(old('wednesday')) ? 'checked' : '' }} >W
          </label>
          <label class="checkbox-inline">
            <input class="days" type="checkbox" name="thursday" value="4"  {{ ! empty(old('thursday')) ? 'checked' : '' }} >Th
          </label>
          <label class="checkbox-inline">
            <input class="days" type="checkbox" name="friday" value="5"  {{ ! empty(old('friday')) ? 'checked' : '' }} >F
          </label>
          <label class="checkbox-inline">
            <input type="date" name="repeat_date" id="repeat_date" value="{{ old('repeat_date')}} ">
             @if ($errors->has('repeat_date'))
                <span class="text-danger">{{ $errors->first('repeat_date') }}</span>
              @endif 
          </label>
              </div><br>
            </div>
        
          <input type="hidden" id="numberOfSession" name="number_of_session" value="" />

         
       </div>
     </div>
     <input type="submit" name="btn" id="btn" style="display: none;">
    </form>
     <br>
     <div class="panel panel-primary">
      <br>
      <div class="panel-body">
        <div class="row">
        <div class="col-md-6">
          <table class="table table-responsive table-striped table-condensed">
            <tr>
              <th>Session cost for GP</th>
              <td id="hours"></td>
              <td id="subTotal"></td>
            </tr>
            <tr>
              <th>Lantum Fee</th>
              <td></td>
              <td>$60</td>
            </tr>
            <tr>
              <th>VAT (on lantum fee)</th>
              <td></td>
              <td>$12</td>
            </tr>
            <tr>
              <th>Total cost per session</th>
              <td></td>
              <td id="costPerSession"> </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <table class="table table-responsive table-striped">
            <tr>
              <th>Number of Session</th>
              <td id="session"></td>
            </tr>
            <tr>
              <th>Total cost of All Session </th>
              <td id="totalSessionPrice"></td>
            </tr>
          </table>
        </div>
        
      </div>
      </div>
    </div>
      
      <div class="row">
        <div class="col-md-12">

          <a href="{{url('practice/store-job-session')}}" class="btn btn-success pull-right"  onclick="event.preventDefault();
                document.getElementById('session-submit').submit();">Next</a>
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
                  var days = [];
                  $('.days').each(function(){
                    if($(this).is(":checked")){
                      days.push($(this).val());
                    }
                      
                  });

                var repeat_date = $('#repeat_date').val();
                var start_date = $('#start_date').val();
                var dateStr = new Date(start_date);
                var dateEnd = new Date(repeat_date);

                var number_of_session = countCertainDays(days,new Date(start_date),new Date(repeat_date));


                function countCertainDays( days, d0, d1 ) {
                          var ndays = 1 + Math.round((d1-d0)/(24*3600*1000));
                          var sum = function(a,b) {
                              return a + Math.floor( ( ndays + (d0.getDay()+6-b) % 7 ) / 7 ); };
                          return days.reduce(sum,0);
                      }
                
                var hours = 0;
                var subTotal = 0;
                var totalSessionPrice = 0;
                var start = $('#start_time').val();
                var end = $('#end_time').val();
                var hourRate = $('#hourly_rate').val();
                var unpaidBreakHr = $('#unpaid_break_hr').val();
                var unpaidBreakMin = $('#unpaid_break_min').val();

                var startTime=moment(start, "HH:mm:ss a");
                var endTime=moment(end, "HH:mm:ss a");
                var duration = moment.duration(endTime.diff(startTime));
                var hours = parseInt(duration.asHours());
                var minutes = parseInt(duration.asMinutes())-hours*60;
                var totalHr = hours - unpaidBreakHr;

                var hrPerMin = totalHr * 60 ;
                var totalMin = (hrPerMin + minutes) - unpaidBreakMin ;
                var minCount = minutes - unpaidBreakMin;
                $('#hours').text(totalHr + ' : '+ minCount);


                var session = $('#session').text(number_of_session);
                  $('#numberOfSession').val(number_of_session);

                 costPerMin =  hourRate /  60  ;
                  subTotal = costPerMin * totalMin   ;
                  var lantumFee = 60 ;
                  var vat = (12/100) * (subTotal + lantumFee);
                  var costPerSession = subTotal + lantumFee + vat;
                   totalSessionPrice = parseFloat(costPerSession) * parseFloat(number_of_session);

                  $('#subTotal').text('$ ' + parseInt(subTotal));
                  $('#costPerSession').text('$ ' + parseInt(costPerSession));
                  $('#totalSessionPrice').text('$ ' + parseFloat(totalSessionPrice));

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