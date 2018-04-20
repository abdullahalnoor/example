
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Doctor</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="col-sm-6">
              <div class="panel-body">
                <div class="box box-primary">
                    <div class="box-body box-profile">
                      <div class="row">
                        <div class="col-md-6 col-sm-6">
                          @If($lucum->image)
                            <img class="profile-user-img img-responsive img-circle" style="width: 100px;height: 100px;border-radius: 50%;" src="{{asset($lucum->image)}}" alt="User profile picture">
                            @else
                            <img class="profile-user-img img-responsive img-circle" src="{{asset('/lucum-profile/no_image_available.png')}}" alt="User profile picture">
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <h3 class="profile-username">{{ $lucum->first_name.' '.$lucum->last_name}}</h3>
                          <h5 class="">{{ $lucum->gmc_number }}</h5>
                          <p class="text-muted">Doctor</p>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-6">
                            <li class="list-group-item">
                             <a href="" ><b>LEAVE FEEDBACK</b></a>
                            </li>
                          </div>
                           <div class="col-sm-6">
                            <li class="list-group-item">
                             <a href="" ><b>LEAVE FEEDBACK</b></a>
                          </li>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm-6">
                            <li class="list-group-item">
                             <a href="" ><b>LEAVE FEEDBACK</b></a>
                            </li>
                          </div>
                           <div class="col-sm-6">
                            <li class="list-group-item">
                             <a href="" ><b>LEAVE FEEDBACK</b></a>
                          </li>
                        </div>
                      </div>


                    </div>
                    <!-- /.box-body -->
                  </div>
              </div>
              <div class="panel-group" id="accordion0">
                  <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                      <h4 class="panel-title">
                        <a  data-toggle="collapse" data-parent="#accordion0" href="#collapse0">VERIFICATION DOCUMENTS UPLOADED</a>
                      </h4>
                    </div>
                    <div id="collapse0" class="panel-collapse collapse in">
                      <div class="panel-body">
                        @if($lucumDocument->all())
                            @foreach($lucumDocument as $item)
                            <li class="list-group-item text-center">
                              <p>
                                <span class="pull-left">{{ $item->name }}</span>
                              <span class="pull-right"><a href="{{ asset($item->document) }}" download="">Download</a></span>
                              </p>
                            </li>
                            @endforeach
                          @else
                          <li class="list-group-item text-center text-danger">No Data..</li>
                          @endif
                      </div>
                    </div>
                  </div>
                </div>
                <a href="{{url('practice/all-document-download/'.$lucum->id)}}" class="btn btn-block btn-default">DOWNLOAD ALL DOCUMENTS</a>
            </div><!--end of first col-sm-6 -->
            <br>
            <div class="col-sm-6">
              <div class="panel-group" id="accordion">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h4 class="panel-title text-center ">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">IT SYSTEMS</a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                      <div class="panel-body">
                         @if($lucumItSystem->all())
                            @foreach($lucumItSystem as $item)
                            <li class="list-group-item text-center">{{ $item->name }}</li>
                            @endforeach
                          @else
                          <li class="list-group-item text-center text-danger">No Data..</li>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h4 class="panel-title text-center">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">QUALIFICATIONS</a>
                      </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                      <div class="panel-body">
                         @if($lucumQualification->all())
                            @foreach($lucumQualification as $item)
                            <li class="list-group-item text-center">{{ $item->instiitute_name }}</li>
                            @endforeach
                          @else
                          <li class="list-group-item text-center text-danger">No Data..</li>
                          @endif
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h4 class="panel-title text-center">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">PREVIOUS WORK EXPERIENCE</a>
                      </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                      <div class="panel-body">
                        <ul class="list-group">
                          @if($lucumExperience->all())
                            @foreach($lucumExperience as $item)
                            <li class="list-group-item text-center">{{ $item->company_name }}</li>
                            @endforeach
                          @else
                          <li class="list-group-item text-center text-danger">No Data..</li>
                          @endif
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h4 class="panel-title text-center">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">SPOKEN LANGUAGES</a>
                      </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                      <div class="panel-body">
                        <ul class="list-group">
                          @if($lucumLanguage->all())
                            @foreach($lucumLanguage as $item)
                            <li class="list-group-item text-center">{{ $item->name }}</li>
                            @endforeach
                          @else
                          <li class="list-group-item text-center text-danger">No Data..</li>
                          @endif
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div><!--end of second col-sm-6 -->
          </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>