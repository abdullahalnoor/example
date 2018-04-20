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
      <h1>
        My Dashboard
      </h1>
      <ol class="breadcrumb">
        <li>
          <a href="" class="btn btn-success pull-right">Create Jobs</a>
        </li>
        
      </ol>
    </section>

    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-7">
          <div class="row">
               <div class="col-md-4 col-xs-12" >
              <!-- small box -->
              <div class="small-box bg-aqua text-center" style="min-height: 180px">
                <div class="inner">
                  <h3>150</h3>

                  <p>My Doctor</p>
                </div>
               <!--  <div class="icon">
                  <i class="ion ion-bag"></i>
                </div> -->
                
              </div>
            </div>
            <!-- ./col -->
            <div class="col-md-4 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-green text-center" style="min-height: 180px">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Completed Jobs</p>
                </div>              
              </div>
            </div>
            <div class="col-md-4 col-xs-12">
              <!-- small box -->
              <div class="small-box bg-green text-center" style="min-height: 180px">
                <div class="inner">
                  <h3>53<sup style="font-size: 20px">%</sup></h3>

                  <p>Posted Jobs </p>
                </div>

              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
        <div class="col-lg-5">
          <div class="row">
            <div class="col-md-6 col-xs-12 text-center">
              <!-- small box -->
              <div class="">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div class="form-group">
                      <!-- <div class="input-append date" id="dp6" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                      <input type="hidden" class="span2" size="10" value="12-02-2012">
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div> -->
                    <div id="dp6" class="dp6" data-date="12-02-2012" data-date-format="dd-mm-yyyy"></div>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
          
            <div class="col-md-6 col-xs-12 text-center">
              <!-- small box -->
              <div class="">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                 <div class="form-group">
                      <!-- <div class="input-append date" id="dp6" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                      <input type="hidden" class="span2" size="10" value="12-02-2012">
                      <span class="add-on"><i class="icon-th"></i></span>
                    </div> -->
                    <div id="" class="dp6" data-date="12-02-2012" data-date-format="dd-mm-yyyy"></div>
                    </div>
           
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
        
        </div>

       
      </div>
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