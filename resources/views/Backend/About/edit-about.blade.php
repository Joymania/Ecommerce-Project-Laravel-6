@extends('Backend.layouts.master');

@section('content')

    <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage AboutUs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">AboutUs</li>
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
                    Add AboutUs
                    <a class=" float-right btn btn-success btn-sm" href="{{ route('about_us.view') }}"><i class="fa fa-plus-circle"></i>AboutUs List</a>
                  </h3>
                </div>
                <div class="card-body">
                  <form method="post" action="{{ route('about_us.update',$editdata->id) }}" id="myform" enctype="multipart/form-data">
                      @csrf
                      <div class="form-row">
                          <label for="description">Description</label>
                          <textarea name="description" id="description"  cols="100" rows="5" class="from-control">{{ $editdata->description }}</textarea>
                      </div>

                          <div class="form-group col-md-6" style="padding-left: 70px;padding-top:30px">
                              <input type="submit" value="Update" class="btn btn-primary">

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




