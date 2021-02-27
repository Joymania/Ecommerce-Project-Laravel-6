@extends('Frontend.layouts.master')

@section('content')

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('Frontend/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Customer Shipping Information
    </h2>
</section>

<!-- About us Section -->
<section class="about_us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form method="POST" action="{{ route('checkout-store') }}" id="myform">
                        @csrf
                        <div class="form-row">

                             <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" required >
                                <font style="color: red">{{ ($errors->has('name'))? ($errors->first('name')):''}}</font>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" >

                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Mobile</label>
                                <input type="tel" name="mobile" class="form-control" required>
                                <font style="color: red">{{ ($errors->has('mobile'))? ($errors->first('mobile')):''}}</font>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile">Address</label>
                                <input type="text" name="address" class="form-control" required>
                                <font style="color: red">{{ ($errors->has('address'))? ($errors->first('address')):''}}</font>
                            </div>

                            <div class="form-group col-md-12" style="padding-top: 30px">
                                <input type="submit" value="Submit" class="btn btn-primary">

                            </div>

                        </div>

                    </form>
                  </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myform').validate({
        rules: {
           name: {
            required: true,
          },
          mobile: {
            required: true,
          },
          address: {
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
