
  <div class="modal fade" id="addQualityInfo" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Your Qualification Info</h4>
        </div>
        <div class="modal-body">
          <ul id="message">
            
          </ul>
             <form class="form-horizontal" action="{{url('lucum/store-qualification')}}" id="quaFrmData" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Qualification Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Such as MBBS">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instiitute_name" class="col-sm-2 control-label">Institute Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="instiitute_name" id="instiitute_name" placeholder="Versity or Training center">
                        </div>
                    </div>              
                    <div class="form-group">
                        <label for="start_date" class="col-sm-2 control-label">Start Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="start_date" id="start_date" >
                        </div>
                    </div> 
                     <div class="form-group">
                        <label for="end_date" class="col-sm-2 control-label">End Date</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" name="end_date" id="end_date" >
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

