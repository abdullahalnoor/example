@extends('front.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <br/>
            <h3 class="text-center text-success">My Shopping Cart</h3>
        </div>
        <div class="col-sm-12">
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL No</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @php($sum=0)
                    @forelse($cartProducts as $cartProduct)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $cartProduct->id }}</td>
                        <td>{{ $cartProduct->name }}</td>
                        <td><img src="{{ asset($cartProduct->options->image) }}" alt="" height="50" width="50"/></td>
                        <td>TK. {{ $cartProduct->price }}</td>
                        <td>
                            <form action="{{ url('/update-cart-product') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="number" value="{{ $cartProduct->qty }}" name="qty" min="1">
                                <input type="hidden" value="{{ $cartProduct->rowId }}" name="rowId">
                                <input type="submit" value="Update" name="btn">
                            </form>
                        </td>
                        <td>TK. {{ $total = $cartProduct->price*$cartProduct->qty }}</td>
                        <td>
                            <a href="{{ url('/delete-cart-product/'.$cartProduct->rowId) }}" class="btn btn-danger btn-xs" title="Delete Cart Product">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>
                     @php($sum = $sum + $total)
                    @empty
                        <h1>No product avaliable</h1>
                    @endforelse
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th>Sub Totla</th>
                        <td>TK. {{ $sum }} </td>
                    </tr>
                    <tr>
                        <th>Discount</th>
                        <td>TK. {{ $discount = 0 }}</td>
                    </tr>
                    <tr>
                        <th>Tax</th>
                        <td>TK. {{ $tax = 0 }}</td>
                    </tr>
                    <tr>
                        <th>Grand Totla</th>
                        <td>TK. {{ $grandTotal = ($sum - $discount) + $tax }}</td>
                        {{ Session::put('grandTotal', $grandTotal) }}
                    </tr>
                </table>
                <table class="table table-borderd">
                    <tr>
                        <td>
                            <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
                        </td>
                        <td>
                            @if(Session::get('customerId'))
                            <a href="{{ url('/shipping-info') }}" class="btn btn-primary">Checkout</a>
                            @else
                            <a href="{{ url('/checkout') }}" class="btn btn-primary">Checkout</a>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
