
  <div class="modal fade" id="addItInfo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Your It System Info</h4>
        </div>
        <div class="modal-body">
          <ul id="message" class="list-group">
            
          </ul>
             <form class="form-horizontal" action="{{url('lucum/store-it-system')}}" id="itFrmData" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">It System Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" placeholder="">
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

