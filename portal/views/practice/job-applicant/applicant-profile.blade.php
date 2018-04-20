@extends('practice.master')

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
              <h3 class="box-title">Apllicant's Details </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <h3 class="text-success">General Info</h3>
                </tr>
               <tr>
                 <th>Name</th>
                 <td>{{ $lucum->first_name.' '.$lucum->last_name}}</td>
               </tr>
                <tr>
                 <th>Email</th>
                 <td>{{ $lucum->email}}</td>
               </tr>
                <tr>
                 <th>GMC Number</th>
                 <td>{{ $lucum->gmc_number}}</td>
                </tr>
                 <tr>
                 <th>Address one</th>
                 <td>{{ $lucum->address_one}}</td>
                </tr>
                 <th>Address two</th>
                 <td>{{ $lucum->address_two}}</td>
                </tr>
                <th>City</th>
                 <td>{{ $lucum->city}}</td>
                </tr>
                <tr>
                <th>Phone Number</th>
                 <td>{{ $lucum->phone_number}}</td>
                </tr>
                <th>Image</th>
                  @if($lucum->image)
                      <td><img src="{{ asset($lucum->image) }}" style="width: 100px; height: 100px"></td>
                  @else
                    <td>No Image Uploaded</td>
                  @endif
                </tr>
              </table>
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <h3 class="text-success">Documents Info</h3>
                </tr>
                 @if($lucumDocument->count() > 0) 
                  @foreach($lucumDocument as $item)
                 <tr>
                   <th>{{$item->name}}</th>
                   <td><a href="{{asset($item->document)}}" download>Download</a></td>
                 </tr>
                 @endforeach
                 @else
                 <tr>
                    <h3 class="text-center text-danger">No Record Found..</h3>
                 </tr>
                 @endif
              </table>
               <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <h3 class="text-success">It System Info</h3>
                </tr>
                 @if($lucumItSystem->count() > 0) 
                  <tr>
                   <th>Name</th>
                 </tr>
                  @foreach($lucumItSystem as $item)
                 <tr>
                   <td>{{$item->name}}</td>
                 </tr>
                 @endforeach
                 @else
                 <tr>
                    <h3 class="text-center text-danger">No Record Found..</h3>
                 </tr>
                 @endif
              </table>
               
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <h3 class="text-success">Experience Info</h3>
                </tr>
                 @if($lucumExperience->count() > 0) 
                  <tr>
                   <th>Post</th>
                   <th>Company Name</th>
                   <th>Description</th>
                 </tr>
                  @foreach($lucumExperience as $item)
                 <tr>
                   <td>{{$item->post}}</td>
                   <td>{{$item->company_name}}</td>
                   <td>{{$item->description}}</td>
                 </tr>
                 @endforeach
                 @else
                 <tr>
                    <h3 class="text-center text-danger">No Record Found..</h3>
                 </tr>
                 @endif
              </table>
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <h3 class="text-success">Qualification Info</h3>
                </tr>
                 @if($lucumQualification->count() > 0) 
                  <tr>
                   <th>Name</th>
                   <th>Institute Name</th>
                   <th>Start Date</th>
                   <th>End Date</th>
                 </tr>
                  @foreach($lucumQualification as $item)
                 <tr>
                   <td>{{$item->name}}</td>
                   <td>{{$item->instiitute_name}}</td>
                   <td>{{$item->start_date}}</td>
                   <td>{{$item->end_date}}</td>
                 </tr>
                 @endforeach
                 @else
                 <tr>
                    <h3 class="text-center text-danger">No Record Found..</h3>
                 </tr>
                 @endif
              </table>
              <table id="example2" class="table table-bordered table-hover">
                <tr>
                  <h3 class="text-success">Language Info</h3>
                </tr>
                 @if($lucumLanguage->count() > 0) 
                  <tr>
                   <th>Name</th>
                 </tr>
                  @foreach($lucumLanguage as $item)
                 <tr>
                   <td>{{$item->name}}</td>
                 </tr>
                 @endforeach
                 @else
                 <tr>
                    <h3 class="text-center text-danger">No Record Found..</h3>
                 </tr>
                 @endif
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
 