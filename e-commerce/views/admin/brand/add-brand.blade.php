@extends('admin.master')
@section('pageTitle')
Brand
@endsection
@section('pgSubTitle')
Add Brand
@endsection
@section('content')
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add New Brand</h3>
                </div>
                @if($message = Session::get('message'))
                <h3 class="text-center text-success">{{ $message }}</h3>
                    @endif
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" action="{{ url('/brand/new-brand') }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="inputName3" class="col-sm-2 control-label">Brand Name</label>

                                <div class="col-sm-10">
                                    <input type="text" name="brand_name" class="form-control" id="inputName3" placeholder="Add a Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDescription3" class="col-sm-2 control-label">Brand Description</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea" name="brand_description"  placeholder="Enter a Description (optional)" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Publication Status</label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="publication_status">
                                        <option>Select Publication Status</option>
                                        <option value="1">Published</option>
                                        <option value="0">Unpublished</option>                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-offset-2">
                                <button type="submit" name="btn" class="btn btn-info">Save Brand Info</button>
                                <button type="submit" class="btn btn-default">Cancel</button>
                            </div>                        
                        </div>
                        <!-- /.box-footer -->
                    </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
@endsection
