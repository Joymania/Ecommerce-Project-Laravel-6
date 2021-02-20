@extends('Frontend.layouts.master')

@section('content')
<style type="text/css">
#login .container #login-row #login-column #login-box {
  max-width: 600px;
  height: 300px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 0;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -50px;
}
</style>

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('Frontend/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Verify Email
    </h2>
</section>

<!-- About us Section -->
<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('verify-store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Verify Code:</label><br>
                                <input type="text" name="code" id="code" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Verify">
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
          email: {
            required: true,
            email: true,
          },
          code: {
            required: true,
          },
        },
        messages: {

          email: {
            required: "Please enter your email address",
            email: "Please enter a vaild email address",
          },
          code: {
            required: "Please verify your code",
          },
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

@if (session()->has('success'))
<script type="text/javascript">
    $(function(){
        $.notify("{{ session()->get('success') }}",{globalPosition:'top right',className:'success'});
    });
</script>
@endif
@if (session()->has('error'))
<script type="text/javascript">
    $(function(){
        $.notify("{{ session()->get('error') }}",{globalPosition:'top right',className:'error'});
    });
</script>
@endif

@endsection
