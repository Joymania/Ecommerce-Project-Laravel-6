@extends('Frontend.layouts.master')

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

</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('Frontend/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Customer Dashboard
    </h2>
</section>


    <div class="container">
        <div class="row" style="padding: 15px 0px 15px 0px">
            <div class="col-md-2">
                <ul class="prof">
                    <li><a href="{{ route('dashboard') }}">My Profile</a></li>
                    <li><a href="{{ route('password-change') }}">Password Change</a></li>
                    <li><a href="">My Orders</a></li>
                </ul>

            </div>
            <div class="col-md-10">
               <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order NO</th>
                            <th>Total Ammount</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                         @foreach ($orders as $order)

                         <tr>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>{{ $order['payment']['payment_method'] }}
                                @if ($order['payment']['payment_method']=='Bkash')
                                    <span> (Transaction No:{{ $order['payment']['transaction'] }})</span>
                                @endif
                                </td>

                                <td>
                                    @if ($order->status==0)
                                        <span style="background: rgb(236, 94, 94); color:white;">Unapproved</span>
                                    @elseif($order->status==1)
                                    <span style="background: rgb(110, 163, 31)">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    <a title="Details" href="{{ route('order-details',$order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                    <a title="Print" href="{{ route('print-details',$order->id) }}" class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>
                                </td>
                        </tr>
                          @endforeach
                    </tbody>
                </table>

               </div>
            </div>
        </div>
    </div>


@endsection
