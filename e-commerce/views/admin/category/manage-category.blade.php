@extends('admin.master')
@section('pageTitle')
Category
@endsection
@section('pgSubTitle')
Manage Category
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Category Information Data Table</h3>
                </div>
                <!-- /.box-header -->
                @if($message = Session::get('message'))
                <h3 class="text-center text-success">{{ $message }}</h3>
                @endif
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category Id</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->category_description }}</td>

                                <td>
                                    @if($category->publication_status == 1)
                                    <span class="label label-success">Published</span>
                                    @else
                                    <span class="label label-warning">Unpublished</span>
                                    @endif
                                </td>
                                <td>
                                    @if($category->publication_status == 1)
                                    <a href="{{ url('/category/unpublished-category/'.$category->id) }}" class="btn btn-success btn-xs" title="Published">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                    @else
                                    <a href="{{ url('/category/published-category/'.$category->id) }}" class="btn btn-warning btn-xs" title="Unpublished">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                    @endif
                                    <a href="{{ url('/category/edit-category/'.$category->id) }}" class="btn btn-info btn-xs" title="Edit blog">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>   
                                    <a href="{{ url('/category/delete-category/'.$category->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete This ?');">
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

