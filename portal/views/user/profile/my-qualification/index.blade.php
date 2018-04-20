                  <div class="row" id="qualityIndexPage">
                    <div class="col-sm-12" >
                      <div class="panel  panel-info" style="margin: 10px;">
                        <div class="panel-heading"><h4>Add Qualification Info
                          <button id="btnAddQuality" class="pull-right btn btn-md btn-danger">+</button>
                        </h4>
                        </div>
                        <div class="panel-body table-responsive">
                         <table class="table table-striped table-hover">
                             @if($lucumQual->all())
                              <thead>
                                <tr>
                                  <th>Post</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($lucumQual as $item)
                                <tr>
                                  <td>{{ $item->name }}</td>
                                  <td>Demo</td>
                                </tr>
                                @endforeach    
                              @else
                                <div class="alert alert-danger">
                                  <h4 class="text-center">No Data  Found...</h4>
                                </div>
                              @endif
                            </tbody>
                        </div>
                      </div>
                    </div>
                  </div>