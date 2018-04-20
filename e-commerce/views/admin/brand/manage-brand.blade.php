@extends('admin.master')
@section('pageTitle')
Brand
@endsection
@section('pgSubTitle')
Manage Brand
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Brand Information Data Table</h3>
                </div>
                <!-- /.box-header -->
                @if($message = Session::get('message'))
                <h3 class="text-center text-success">{{ $message }}</h3>
                @endif
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Brand Id</th>
                                <th>Brand Name</th>
                                <th>Brand Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td><?php echo $brand->brand_description; ?></td>
                                <td>
                                    @if($brand->publication_status == 1)
                                    <span class="label label-success">Published</span>
                                    @else
                                    <span class="label label-warning">Unpublished</span>
                                    @endif
                                </td>
                                <td>
                                    @if($brand->publication_status == 1)
                                    <a href="{{ url('/brand/unpublished-brand/'.$brand->id) }}" class="btn btn-success btn-xs" title="Published">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                    @else
                                    <a href="{{ url('/brand/published-brand/'.$brand->id) }}" class="btn btn-warning btn-xs" title="Unpublished">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                    @endif
                                    <a href="{{ url('/brand/edit-brand/'.$brand->id) }}" class="btn btn-info btn-xs" title="Edit blog">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>   
                                    <a href="{{ url('/brand/delete-brand/'.$brand->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete This ?');">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>                                            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection



