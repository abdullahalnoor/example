
  <div class="modal fade" id="addImage" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Your Image</h4>
        </div>
        <div class="modal-body">
          <ul id="message" class="list-group">
            
          </ul>
             <form class="form-horizontal" action="{{url('lucum/store-language')}}" method="POST" enctype="multipart/form-data" id="ImgFrmData">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Upload Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image" id="image" >
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



 