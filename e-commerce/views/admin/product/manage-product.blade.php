@extends('admin.master')
@section('pageTitle')
    Product
@endsection
@section('pgSubTitle')
    Manage Product
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Product Information Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    @if($message = Session::get('message'))
                        <h3 class="text-center text-success">{{ $message }}</h3>
                    @endif
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL Id</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>demo</td>
                                    <td>demo</td>
                                    <td>demo</td>
                                    <td>demo</td>
                                    <td>demo</td>
                                    <td>demo</td>
                                    <td>demo</td>
                                    <td>
                                        <a href="" title="View Product Details" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-zoom-in"></span>
                                        </a>
                                        <a href="" title="Published Product" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                        <a href="" title="Edit Product" class="btn btn-primary btn-xs">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="" title="Delete Product" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
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

