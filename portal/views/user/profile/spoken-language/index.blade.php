                  <div class="row" id="LangIndexPage">
                    <div class="col-sm-12" >
                      <div class="panel  panel-info" style="margin: 10px;">
                        <div class="panel-heading"><h4>Add Language Info
                          <button id="btnAddLang" class="pull-right btn btn-md btn-danger">+</button>
                        </h4>
                        </div>
                        <div class="panel-body table-responsive">
                           <table class="table table-striped table-hover">
                             @if($lucumLanguage->all())
                              <thead>
                                <tr>
                                  <th>Post</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($lucumLanguage as $item)
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
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>