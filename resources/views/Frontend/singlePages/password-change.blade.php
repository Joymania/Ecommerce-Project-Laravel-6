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
            <section class="content">
                <div class="container-fluid">

                  <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                      <!-- Custom tabs (Charts with tabs)-->
                      <div class="card">
                        <div class="card-header">
                          <h3>
                            Password Change
                            <a class=" float-right btn btn-success btn-sm" href="{{ route('profiles.view') }}"><i class="fa fa-plus-circle"></i>My Profile</a>
                          </h3>
                        </div>
                        <div class="card-body">
                          <form method="post" action="{{ route('password-update') }}" id="myform">
                              @csrf
                              <div class="form-row">
                                  <div class="form-group col-md-4">
                                  <label for="current_password">Current Password</label>
                                  <input type="password" name="current_password" id="current_password" class="form-control" >
                                  <font style="color: red">{{ ($errors->has('current_password'))? ($errors->first('current_password')):''}}</font>
                              </div>

                                  <div class="form-group col-md-4">
                                      <label for="new_password">New Password</label>
                                      <input type="password" name="new_password" id="new_password" class="form-control" >
                                      <font style="color: red">{{ ($errors->has('new_password'))? ($errors->first('new_password')):''}}</font>
                                  </div>

                                  <div class="form-group col-md-4">
                                      <label for="confirm_password">Confirm New Password</label>
                                      <input type="password" id="confirm_password" name="confirm_password" class="form-control" >
                                  </div>
                                  <div class="form-group col-md-6">
                                      <input type="submit" value="Update" class="btn btn-primary">

                                  </div>

                              </div>

                          </form>
                        </div>
                        </div>
                        </section>

                      </div>
                      </div>
                    </section>
                  </div>


        </div>
    </div>

<script type="text/javascript">
              $(document).ready(function () {
                $('#myform').validate({
                  rules: {
                      current_password: {
                      required: true,
                      minlength: 6,
                    },
                    new_password: {
                      required: true,
                      minlength: 6,
                    },
                    confirm_password: {
                      required: true,
                      equalTo:'#new_password',
                    },
                  },
                  messages: {

                      current_password: {
                      required: "Please provide a password",
                      minlength: "Your password must be at least 6 characters long",
                    },
                    new_password: {
                      required: "Please provide New password",
                      minlength: "Your password must be at least 6 characters long",
                    },
                    confirm_password: {
                      required: "Please enter again New password",
                      equalTo:"Password should be matched New Password",
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
