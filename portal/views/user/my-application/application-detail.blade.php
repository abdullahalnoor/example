@extends('user.master')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <!--  <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> Job Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if($success = Session::get('success'))
              <h2 class="text-center text-success">{{ $success }}</h2>
              @endif
              <table id="example2" class="table table-bordered table-hover">
              
               <tr>
                 <th>Title</th>
                 <td>{{ $jobSession->title}}</td>
               </tr>
               <tr>
                 <th>Description</th>
                 <td>{!! $jobSession->description !!}</td>
               </tr>
                <tr>
                 <th>Start Date </th>
                 <td>{{ $jobSession->start_date}}</td>
               </tr>
                <tr>
                 <th>End  Date </th>
                 <td>{{ $jobSession->repeat_date}}</td>
               </tr>
               <tr class="table-responsive">
                 <th>Working Days  </th>
                 <td >
                   <table class="table">
                     <tr>
                       <th>Sa</th>
                       <th>Su</th>
                       <th>Mo</th>
                       <th>Tu</th>
                       <th>We</th>
                       <th>Th</th>
                       <th>Fr</th>
                     </tr>
                     <tr>
                       <td class="days">{{ $jobSession->saturday === null?'NO':'YES'}}</td>
                       <td class="days">{{ $jobSession->sunday === null?'NO':'YSE'}}</td>
                       <td class="days">{{ $jobSession->monday === null?'NO':'YES'}}</td>
                       <td class="days">{{ $jobSession->tuesday === null?'NO':'YES'}}</td>
                       <td class="days">{{ $jobSession->wednesday === null?'NO':'YES'}}</td>
                       <td class="days">{{ $jobSession->thursday === null?'NO':'YES'}}</td>
                       <td class="days">{{ $jobSession->friday === null?'NO':'YES'}}</td>
                     </tr>
                   </table>
                 </td>
               </tr>
               <tr>
                 <th>Hourly Rate</th>
                 <td>$ {{ $jobSession->hourly_rate}}</td>
               </tr>
                
              <tr>
                 <th>Number of Session </th>
                 <td> {{ $jobSession->number_of_session == null?'No More Session': $jobSession->number_of_session }} </td>
               </tr>
            
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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