
  <div class="modal fade" id="addDocInfo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Your Documents Info</h4>
        </div>
        <div class="modal-body">
          <ul id="message" class="list-group">
            
          </ul>
             <form class="form-horizontal" action="{{url('lucum/store-document')}}" id="docFrmData" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label"> Document Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" placeholder="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="document" class="col-sm-2 control-label"> Upload Document </label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="document" id="document">
                        </div>
                    </div>                               
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" class="btn btn-warning"  data-dismiss="modal" >Close</button>
                    <button type="submit" class="btn btn-info pull-right">Save  Experience Info  </button>
                  </div>
                 </div>
                  
                </form>
        
      </div>
      
    </div>
  </div>

