
  <div class="modal fade" id="addExpInfo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Your Experience Info</h4>
          <ul id="message" class="list-group">
           
          </ul>
        </div>
        <div class="modal-body">
             <form class="form-horizontal" action="{{url('lucum/store-experience')}}" method="POST" id="expFrmData" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                        <label for="post" class="col-sm-2 control-label">Post</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="post" id="post" placeholder="Post">
                        </div>
                    </div> 
                     <div class="form-group">
                        <label for="company_name" class="col-sm-2 control-label">Company Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="description" id="description" placeholder="Write Description"></textarea>
                        </div>
                    </div>                    
                         
                                                         
                     </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-warning">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Save  Experience Info  </button>
                  </div>
                 </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </form>
        
      </div>
      
    </div>
  </div>

