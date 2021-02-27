
@extends('Frontend.layouts.master')

@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('Frontend/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Contact
    </h2>
</section>

<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form method="post" action="{{ route('store.contact') }}" id="form">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Send Us A Message
                    </h4>
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Your Name" value="" required="">
                        <img class="how-pos4 pointer-none" src="{{ asset('Frontend') }}/images/icons/user.png" alt="ICON">
                        <font color="red"><b></b></font>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Your Email Address" value="" required="">
                        <img class="how-pos4 pointer-none" src="{{ asset('Frontend') }}/images/icons/icon-email.png" alt="ICON">
                        <font color="red"><b></b></font>
                    </div>

                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="mobile_no" placeholder="Your Mobile Number" value="" required="">
                        <img class="how-pos4 pointer-none" src="{{ asset('Frontend') }}/images/icons/mobile.png" alt="ICON">
                        <font color="red"><b></b></font>
                    </div>

                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Your Message" required=""></textarea>
                        <font color="red"><b></b></font>
                    </div>

                    <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                        Submit
                    </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Address
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            {{ $contact->address }}
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Lets Talk
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            {{ $contact->mobile_no }}
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Sale Support
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            {{ $contact->email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3084.4734897454186!2d89.27786434212067!3d24.013547109416997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe84f0ec23a72b%3A0x775d6cd53cbdad8b!2sPabna+University+of+Science+And+Technology!5e1!3m2!1sen!2sbd!4v1533635221275" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
</div><br/>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myform').validate({
        rules: {
            name: {
            required: true,
          },
          email: {
            required: true,
          },
          mobile_no: {
            required: true,
          },
          address: {
            required: true,
          },
          message: {
            required: true,
          },

        },
        messages: {

            name: {
            required: "Please provide your name",
          },
          email: {
            required: "Please provide your email",
          },
          mobile_no: {
            required: "Please provide your mobile number",
          },
          address: {
            required: "Please provide your address",
          },
          message: {
            required: "Please provide your message",
          }

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

