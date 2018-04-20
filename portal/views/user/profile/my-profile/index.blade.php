                  <div class="row" id="ProIndexPage">
                    <div class="col-sm-12" >
                      <div class="panel  panel-info" style="margin: 10px;">
                        <div class="panel-heading"><h4>Upload Your Image
                          <button id="btnAddImg" class="pull-right btn btn-md btn-danger">+</button>
                        </h4>
                        </div>
                        <div class="panel-body table-responsive">
                          <div class="alert alert-success">
                            <p>Profile Info</p>
                          </div>
                           <table class="table table-striped table-hover">
                            <tr>
                              <th>Name</th>
                              <td>{{ $user->first_name.' '.$user->last_name }}</td>
                            </tr>
                            <tr>
                              <th>Mail</th>
                              <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                              <th>GMC Number</th>
                              <td>{{ $user->gmc_number }}</td>
                            </tr>
                             <tr>
                              <th>Image</th>
                              @if($user->image)
                              <td><img src="{{ asset($user->image) }}" style="width: 200px; height: 100px"></td>
                              @else
                              <td>No Image Uploaded</td>
                              @endif
                            </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>