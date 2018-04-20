<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\Product;
use App\Shipping;
use Illuminate\Http\Request;
use App\Order;
use DB;
use App\Customer;
use PDF;
use App\User;

class OrderController extends Controller
{
    public function manageOrderInfo() {
//        $orders = Order::all();
        $orders = DB::table('orders')
                        ->join('customers', 'orders.customer_id', '=', 'customers.id')
                        ->join('payments', 'orders.id', '=', 'payments.order_id')
                        ->select('orders.*', 'customers.first_name', 'customers.last_name', 'payments.payment_type', 'payments.payment_status')
                        ->orderBy('orders.id', 'desc')
                        ->get();
//        return $orders;


        return view('admin.order.manage-order', ['orders'=>$orders]);
    }
    public function viewOrderDetail($id) {
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $products = OrderDetail::where('order_id', $order->id)->get();

        return view('admin.order.view-order', [
            'customer'=>$customer,
            'shipping'=>$shipping,
            'products'=>$products
        ]);
    }
    public function viewOrderInvoice($id) {

        return view('admin.order.view-invoice');
    }
    public function myPdf() {
        $users = User::all();
        $pdf = PDF::loadView('admin.order.demo', ['users'=>$users]);
//        return $pdf->stream('demo.pdf');
        return $pdf->download('demo.pdf');
    }
    public function editOrderInfo($id) {
        return view('admin.order.edit-order');
    }
    public function updateOrderInfo(Request $request) {
        $id = $request->id;

        $order = Order::find($id);
        $order->order_status = 'Successfull';
        $order->save();

        $payment = Payment::where('order_id', $id)->first();
        $payment->payment_status = 'Successfull';
        $payment->save();

        $orderDetails = OrderDetail::where('order_id', $id)->get();
        foreach ($orderDetails as $orderDetail) {
            $product = Product::find($orderDetail->product_id);
            $product->product_quantity = $product->product_quantity - $orderDetail->product_quantity;
            $product->save();
        }


    }
}
