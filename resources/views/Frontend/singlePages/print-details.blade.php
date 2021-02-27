<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Invoice</title>
<style>
    table{
        padding: 10px;
    }
</style>

</head>
<body>
    <center>
        <table class="txt-center  mytable" width="900px" border="1">
            <tr style="text-align: center">
                <td width="30%">
                    <img style="width: 150px;height: 60px;" src="{{ url('upload/Logo_images/'.$logo->image) }}" alt="IMG-LOGO">
                </td>
                <td width="40%">
                    <h4><strong>Ecommerce Website JOymania</strong></h4>

                    <span><strong>Email: </strong>{{ $contact->email }}</span><br>
                    <span><strong>Address: </strong>{{ $contact->address }}</span>
                     <span><strong>Mobile No: </strong>{{ $contact->mobile_no }}</span>
                </td>
                <td width="30%">
                    <strong>Order NO: #{{ $order->order_no }}</strong>
                </td>
            </tr>
            <tr style="text-align: center">
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

            <tr style="text-align: center">
                <td colspan="3"><strong>Order Details</strong> </td>
            </tr>
            <tr>
                <td style="text-align: center"><strong>Product Name & Image</strong></td>
                <td style="text-align: center"><strong>Color & Size</strong></td>
                <td style="text-align: center"><strong>Quantity & Price</strong></td>
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
    </center>
</body>
</html>
