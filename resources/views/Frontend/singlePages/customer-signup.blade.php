@extends('Frontend.layouts.master')

@section('content')
<style type="text/css">
#login .container #login-row #login-column #login-box {
  max-width: 600px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 0;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: 50px;
}
</style>

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('Frontend/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Register
    </h2>
</section>

<!-- About us Section -->
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('signup-store') }}" method="POST">
                            @csrf
                            <h3></h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Full Name:</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Mobile NO:</label><br>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Confirm Password:</label><br>
                                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Signup">
                                <i class="fa fa-user"></i> Have account? <a href="{{ route('customer-login') }}"><span>Login</span></a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function () {
      $('#login-form').validate({
        rules: {
           name: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          mobile: {
            required: true,
          },
          password: {
            required: true,
            minlength: 6,
          },
          confirmpassword: {
            required: true,
            equalTo:'#password',
          },
        },
        messages: {
             name:{
                required:"Please enter your Fullname",
            },

            mobile:{
                required:"please enter mobile number",
            },

          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address",
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
          },
          confirmpassword: {
            required: "Please provide confirm password",
            equalTo: "Your password doesn't matched",
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
