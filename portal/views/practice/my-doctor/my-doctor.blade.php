@extends('practice.master')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">My Doctors</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                @if($lucums->all())
                @foreach($lucums as $lucum)
                <div class="col-sm-3">
                   <div class="box box-primary">
                    <div class="box-body box-profile">
                      @If($lucum->image)
                      <img class="profile-user-img img-responsive img-circle" style="width: 100px;height: 100px;border-radius: 50%;" src="{{asset($lucum->image)}}" alt="User profile picture">
                      @else
                      <img class="profile-user-img img-responsive img-circle" src="{{asset('/lucum-profile/no_image_available.png')}}" alt="User profile picture">
                      @endif

                      <h3 class="profile-username text-center">
                        {{ $lucum->first_name.' '.$lucum->last_name}}
                      </h3>

                      <p class="text-muted text-center">Doctor</p>
                       
                      <ul class="list-group list-group-unbordered text-center">
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-sm-3">
                              <input type="checkbox" class="minimal pull-right" >
                            </div>
                            <div class="col-sm-9">
                              <p class="pull-left">Allow Instant Booking</p>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <div class="row">
                            <div class="col-sm-3">
                              <input type="checkbox" class="minimal pull-right" >
                            </div>
                            <div class="col-sm-9">
                              <p class="pull-left">Allow Priority Access</p>
                            </div>
                          </div>
                        </li>
                      </ul>

                      <a href="" class="btn btn-primary btn-block"><b>LEAVE FEEDBACK</b></a>
                      <br>
                      <p class="text-center"><button class="profileById btn btn-link" data-profile="{{ $lucum->id }}" id="viewProfile"><b>VIEW PROFILE</b></button></p>
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div><!-- end of sm-3 -->
                @endforeach
                @else
                <h2 class="text-center text-danger">No Doctor Recruited...</h2>
                @endif
              </div> <!-- end of row -->
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
      <div id="modals">
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@endsection

@section('js')

  <script type="text/javascript">
    $(document).ready(function(){
      $('.profileById').on('click',function(e){
          e.preventDefault();
          var id = $(this).data('profile');
          $.get('{{url("practice/doctor-profile")}}/'+id,function(data){
            $('#modals').empty().append(data);
            $('#myModal').modal('show');
          });
      });
    });
  </script>

@endsection