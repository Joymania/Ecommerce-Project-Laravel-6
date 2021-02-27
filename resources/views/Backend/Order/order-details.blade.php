@extends('Backend.layouts.master')

@section('content')
<style type="text/css">
.prof li{
    background:cornflowerblue;
    padding: 7px;
    margin: 3px;
    border-radius: 15px;
}
.prof li a{
    color: wheat;
    padding-left: 15px;
}
.mytable tr td{
    padding: 15px;
}

</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../Frontend/images/bg-01.jpg')">
    <h2 class="ltext-105 cl0 txt-center">
       Order Details
    </h2>
</section>


    <div class="container">
        <div class="row" style="padding: 15px 0px 15px 0px">
            <div class="card-body">
               <div class="row">
                <table class="txt-center table table-bordered mytable" width="100%" border="1">
                        <tr>
                            <td width="30%">

                            </td>
                            <td width="40%">
                                <h4><strong>Ecommerce Website JOymania</strong></h4>


                            </td>
                            <td width="30%">
                                <strong>Order NO: #{{ $order->order_no }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Shipping Information</strong></td>
                            <td colspan="2" style="text-align: left;">
                            <strong>Name:</strong>{{ $order['shipping']['name'] }} &nbsp;&nbsp;&nbsp&nbsp;&nbsp;
                            <strong>Email:</strong>{{ $order['shipping']['email'] }}&nbsp;&nbsp;&nbsp&nbsp;&nbsp;
                            <strong>Address:</strong>{{ $order['shipping']['address'] }}&nbsp;&nbsp&nbsp;&nbsp;<br>
                            <strong>Mobile:</strong>{{ $order['shipping']['mobile'] }}&nbsp;&nbsp;
                            <strong>Payment:</strong>&nbsp;&nbsp;
                            {{ $order['payment']['payment_method'] }}
                            @if ($order['payment']['payment_method']=='Bkash')
                            <span> (Transaction No:{{ $order['payment']['transaction'] }})</span>
                             @endif
                            </td>
                        </tr>

                        <tr>
                            <td colspan="3"><strong>Order Details</strong> </td>
                        </tr>
                        <tr>
                            <td><strong>Product Name & Image</strong></td>
                            <td><strong>Color & Size</strong></td>
                            <td><strong>Quantity & Price</strong></td>
                        </tr>
                        @foreach ($order['orderdetails'] as $details)
                            <tr>
                                <td>
                                    <img src="{{ url('upload/Product_images/'.$details['product']['image']) }}" style="width: 50px; height: 50px;"> &nbsp; {{ $details['product']['name'] }}
                                </td>
                                <td>
                                    {{ $details['color']['name'] }} <br>
                                    {{ $details['size']['name'] }}
                                </td>

                                <td>
                                    {{ $details->quantity }} pieces<br>
                                    {{ $details['product']['price'] }} tk <br>
                                    @php
                                        $subtotal= $details->quantity* $details['product']['price'];
                                    @endphp
                                    Total {{ $subtotal }}

                                </td>

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" style="text-align: right;"><strong>Grand Total</strong></td>
                            <td><strong>{{ $order->order_total }}</strong></td>

                        </tr>


                </table>

               </div>
            </div>
        </div>
    </div>


@endsection
