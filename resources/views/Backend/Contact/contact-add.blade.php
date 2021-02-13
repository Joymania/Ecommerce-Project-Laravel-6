@extends('Backend.layouts.master');

@section('content')

    <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
                  Add Contact
                  <a class=" float-right btn btn-success btn-sm" href="{{ route('contact.view') }}"><i class="fa fa-plus-circle"></i>Contact List</a>
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{ route('contact.store') }}" id="myform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobile_no">Mobile No</label>
                            <input type="text" name="mobile_no" class="form-control" id="mobile_no">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="address">Email</label>
                            <input type="email" name="email" class="form-control" id="email">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" class="form-control" id="facebook">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" class="form-control" id="twitter">

                        </div>

                        <div class="form-group col-md-4">
                            <label for="youtube">Youtube</label>
                            <input type="text" name="youtube" class="form-control" id="youtube">

                        </div>

                         <div class="form-group col-md-4">
                              <label for="google_plus">Google Plus</label>
                              <input type="text" name="google_plus" class="form-control" id="google_plus">

                           </div>

                        <div class="form-group col-md-6" style="padding-top: 30px">
                            <input type="submit" value="Submit" class="btn btn-primary">

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
  <script type="text/javascript">
    $(document).ready(function () {
      $('#myform').validate({
        rules: {
           name: {
            required: true,
          },
          usertype: {
            required: true,
          },
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 6,
          },
          password2: {
            required: true,
            equalTo:'#password',
          },
        },
        messages: {
             name:{
                required:"Please enter your name",
            },

            usertype:{
                required:"please select a role",
            },

          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address",
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
          },
          password2: {
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




