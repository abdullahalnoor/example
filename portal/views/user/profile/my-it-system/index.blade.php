                  <div class="row" id="itIndexPage">
                    <div class="col-sm-12" >
                      <div class="panel  panel-info" style="margin: 10px;">
                        <div class="panel-heading"><h4>Add It System Info
                          <button id="btnAddIt" class="pull-right btn btn-md btn-danger">+</button>
                        </h4>
                        </div>
                        <div class="panel-body table-responsive">
                          <table class="table table-stripeded table-hover">
                            @if($lucumItSystem->all())
                            <thead>
                              <tr>
                               <th>Name</th> 
                               <th>Action</th> 
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($lucumItSystem as $item)
                              <tr>
                                <td>{{ $item->name }}</td>
                                <td>Demo</td>
                              </tr>
                              @endforeach
                            @else
                              <tr>
                                <td>
                                  <div class="alert alert-danger">
                                    <h4 class="text-center">No Record Found...</h4>
                                  </div>
                                </td>
                              </tr>
                            @endif
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>