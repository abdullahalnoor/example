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
                        <h3 class="box-title">Order Information Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    @if($message = Session::get('message'))
                        <h3 class="text-center text-success">{{ $message }}</h3>
                    @endif
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>SL No</th>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->first_name.' '.$order->last_name }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        <a href="{{ url('/order/view-order-details/'.$order->id) }}" class="btn btn-info btn-xs" title="View Order Details">
                                            <span class="glyphicon glyphicon-zoom-in"></span>
                                        </a>

                                        <a href="{{ url('/order/view-order-invoice/'.$order->id) }}" class="btn btn-warning btn-xs" title="View Order Invoice">
                                            <span class="glyphicon glyphicon-zoom-out"></span>
                                        </a>
                                        <a href="{{ url('/pdf') }}" class="btn btn-success btn-xs" title="Download Invoice">
                                            <span class="glyphicon glyphicon-download"></span>
                                        </a>
                                        <a href="{{ url('/order/edit-order/'.$order->id) }}" class="btn btn-primary btn-xs" title="Edit Order">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="{{ url('/order/delete-order/'.$order->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete This ?');" title="Order Delete">
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

