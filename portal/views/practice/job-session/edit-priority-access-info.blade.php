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
                <a href="#" class="list-group-item active ">3.Priority Access </a>
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
         <h3>Priority-Access-Acorn &  Gaumont House Survey</h3>
       </div>     
      </div>
      <br>
       <div class="row">      
       <div class="alert alert-succes">
        <h4>
          <form id="enableAccess" action="{{url('practice/store-edit-job-session-priority-access')}}" method="POST">
            {{csrf_field()}}
            <input type="checkbox" name="priority" value="1" {{ (! empty(old('priority')) ? 'checked' : '') }} >
            </form>
           <small>Enable Priority Access</small>
         </h4>
       <p>Give advance booking access to your favourite doctors before offering it to all lantum</p>

       </div>     
      </div>
   
      
      <br>
     
     
      <div class="row">
        <div class="col-md-12">
          <a href="{{url('practice/edit-job-session-view/'.Session::get('id'))}}" class="btn btn-warning">Back</a>
          <a href="{{url('practice/store-edit-job-session-priority-access')}}" class="btn btn-success pull-right" onclick="event.preventDefault();
                document.getElementById('enableAccess').submit();">Next</a>

        </div>
      </div>




    
     
    

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