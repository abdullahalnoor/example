
  <div class="modal fade" id="addLangInfo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Your Language Info</h4>
        </div>
        <div class="modal-body">
          <ul id="message" class="list-group">
            
          </ul>
             <form class="form-horizontal" action="{{url('lucum/store-language')}}" method="POST" enctype="multipart/form-data" id="lanFrmData">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Language Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Language Name">
                        </div>
                    </div>                            
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="" class="btn btn-warning">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Save Info  </button>
                  </div>
                 </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </form>
        
      </div>
      
    </div>
  </div>

