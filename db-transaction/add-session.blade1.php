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
      <div class="row">      
       <div class="alert alert-succes">
         <h3>Add a session - The Acorn Gaumont House Survey</h3>
       </div>     
      </div>
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
              <input type="date" id="start_date" name="start_date" class="span2" size="10" > 
            </td>
            <td style="padding: 10px">
             <input type="time" name="start_time" id="start_time" class="span2" size="10" > 
            </td>
            <td style="padding: 10px">
             <input type="time" name="end_time" id="end_time" class="span2" size="10" > 
            </td>
            <td style="padding: 10px">
               <input type="number" name="unpaid_break_hr" id="unpaid_break_hr" min="1" max="2">
               <input type="number" name="unpaid_break_min" id="unpaid_break_min" min="1" max="2">
            </td>
            <td style="padding: 10px">
             <input type="number" name="hourly_rate" id="hourly_rate" class="span2" size="10" > 
            </td>
          </tr>
        </table>
       </div>     
      </div><br>
      <div class="row">      
       <div class="col-md-12">
        <h3>Repeat these session times on more days</h3><br>
         <div><strong><b>Repeat Evereday :</b> </strong>
           <label class="checkbox-inline">
            <input type="checkbox" name="saturday"  value="Saturday">Sa
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="sunday" value="Sunday">Su
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="monday" value="Monday">M
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="tuesday" value="Tuesday">Tu
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="wednesday" value="Wednesday">W
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="thursday" value="Thursday">Th
          </label>
          <label class="checkbox-inline">
            <input type="checkbox" name="friday" value="Friday">F
          </label>
          <label class="checkbox-inline">
            <input type="date" name="repeat_date">
          </label>
         </div>
       </div>
     </div>
     <input type="submit" name="btn" id="btn" style="display: none;">
    </form>
     <br>
     <br>
     <br>
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
              var countChecked = function() {
                var n = $( "input:checked" ).length;
                 $( "#session" ).text( n + ((n === 1 )-3));
              };
               
              $( "input[type=checkbox]" ).on( "click", countChecked );

              $(document).on('change',function(){


// var date = document.getElementById('repeat_date').value;
 var date = $('#repeat_date').val();


  var event1 = new Date('date');
var event2 = new Date();
event2.setTime(event1.getTime());
console.log(event2);

// var getTot = daysInMonth(d.getMonth(),d.getFullYear()); //Get total days in a month
// var sat = new Array();   //Declaring array for inserting Saturdays
// var sun = new Array();   //Declaring array for inserting Sundays

// for(var i=1;i<=getTot;i++){    //looping through days in month
//     var newDate = new Date(d.getFullYear(),d.getMonth(),i)
//     if(newDate.getDay()==0){   //if Sunday
//         sun.push(i);
//     }
//     if(newDate.getDay()==6){   //if Saturday
//         sat.push(i);
//     }

// }
// // console.log(sat);
// // console.log(sun);


// function daysInMonth(month,year) {
//     return new Date(year, month, 0).getDate();
// }






              countChecked();
                
                var hours = '';
                var subTotal = '';
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
                // alert (hours + ' hour and '+ minutes+' minutes.');
                var totalHr = hours - unpaidBreakHr;

                var hrPerMin = totalHr * 60 ;
                var totalMin = (hrPerMin + minutes) - unpaidBreakMin ;
                var minCount = minutes - unpaidBreakMin;
                $('#hours').text(totalHr + ' : '+ minCount);


                var session = $('#session').text();

                 costPerMin =  hourRate /  60  ;
                  subTotal = costPerMin * totalMin   ;
                  var lantumFee = 60 ;
                  var vat = (12/100) * (subTotal + lantumFee);
                  var costPerSession = subTotal + lantumFee + vat;
                  var totalSessionPrice = costPerSession * session;

                  $('#subTotal').text('$ ' + subTotal);
                  $('#costPerSession').text('$ ' + costPerSession);
                  $('#totalSessionPrice').text('$ ' + totalSessionPrice);

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





















// var date = document.getElementById('repeat_date').value;
// var my_date = date.split('-')
// var year = parseInt(my_date[0]);
// var month = parseInt(my_date[1])-1;

// var saturdays = [];
// var sundays = [];

// for (var i = 0; i <= new Date(year, month, 0).getDate(); i++) 
// {    
//     var date = new Date(year, month, i);

//     if (date.getDay() == 6)
//     {
//        saturdays.push(date);
//     } 
//     else if (date.getDay() == 0)
//     {
//         sundays.push(date);    
//     }
// };

// console.log(sundays, saturdays);


</script>
@endsection