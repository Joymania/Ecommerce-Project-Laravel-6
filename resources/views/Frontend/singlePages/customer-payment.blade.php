@extends('Frontend.layouts.master')

@section('content')
<style type="text/css">
.sss{
    float: left;
}
.s888{
    height: 40px;
    border: 1px solid aquamarine;
}

</style>

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('Frontend/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Shopping Cart
    </h2>
</section>

<!-- About us Section -->
<div class="bg0 p-t-75 p-b-85">

    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
                <div class="wrap-table-shopping-cart">
                    <table class="table table-bordered>
                        <tr class="table_head">
                            <th>Product</th>
                            <th>Image</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                        @php
                            $contents=Cart::content();
                            $total=0;
                        @endphp
                        @foreach ($contents as $content)
                            <tr class="table_row">

                            <td>{{ $content->name }}</td>
                            <td>
                                <div class="how-itemcart1">
                                    <img src="{{ asset('upload/Product_images/'.$content->options->image) }}" alt="IMG" style="width: 50px"; height="60px";>
                                </div>
                            </td>
                            <td>{{ $content->options->size_name }}</td>
                            <td>{{ $content->options->color_name }}</td>

                            <td>{{ $content->price }}tk</td>
                            <td style="width: 200px; min-width:200px;">
                                <form action="{{ route('store.cart') }}" method="POST">
                                @csrf
                                 <div>
                                    <input type="number" class="mtext-104 cl3 txt-center num-product form-control sss" id="qty" name="qty" value="{{ $content->qty }}">
                                    <input type="hidden" name="rowId" value="{{ $content->rowId }}">
                                    <input type="submit" value="Update" class="flex-c-m stext-101 c12 bg8 s888 hov-btn3 p-lr-15 trans-04 pointer m-tb--10">
                                </div>
                                </form>

                            </td>
                            <td class="column-5">{{ $content->subtotal }}tk</td>
                            <td class="column-5">

                                     <a class="btn btn-danger" href="{{ route('delete.cart',$content->rowId) }}"><i class="fa fa-remove"></i></a>


                            </td>
                            @php
                                $total+=$content->subtotal;
                            @endphp
                        </tr>


                        @endforeach
                        <tr>
                            <td colspan="6" >Grand Total</td>
                            <td colspan="2"class="text-center">{{ $total }}tk</td>
                        </tr>

                    </table>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-4">
                <h3 style="color: rgb(27, 39, 199)">Select Payment Method</h3>
            </div>
            <div class="col-md-4">
                @if (Session::get('message'))
                        <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('message') }}</strong>
                         </div>
                     @endif
                <form action="{{ route('payment-store') }}" method="POST" id="myform">
                    @foreach ($contents as $content)
                    <input type="hidden" name="product_id" value="{{ $content->id }}">
                    @endforeach
                    @csrf
                <input type="hidden" name="order_total" value="{{ $total }}">
                <select name="payment_method" id="payment_method" class="form-control">
                        <option value="">Select Payment Type</option>
                        <option value="Hand Cash">Hand Cash</option>
                        <option style="color: rgb(230, 126, 143)" value="Bkash">Bkash</option>
                        <font style="color: red">{{ ($errors->has('payment_method'))? ($errors->first('payment_method')):''}}</font>
                </select>
                <div class="show_field" style="display: none;">

                    <span>Bkash No: 01704247162</span>
                    <input type="text" name="transaction" class="form-control" placeholder="Write Transaction NO">

                </div>

                <button type="submit" name="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Submit</button>

                </form>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on('change','#payment_method',function(){
        var payment_method=$(this).val();
        if(payment_method == 'Bkash'){
            $('.show_field').show();
        }
        else
        $('.show_field').hide();
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myform').validate({
        rules: {
            payment_method: {
            required: true,
          },
        },
        messages: {

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>



@endsection
