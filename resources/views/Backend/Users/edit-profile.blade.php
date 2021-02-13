@extends('Backend.layouts.master');

@section('content')

    <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
                  Edit Profile
                  <a class=" float-right btn btn-success btn-sm" href="{{ route('profiles.view') }}"><i class="fa fa-plus-circle"></i>Your Profile</a>
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{ route('profiles.update',$editdata->id) }}" id="myform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                         <div class="form-group col-md-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $editdata->name }}" class="form-control" >
                            <font style="color: red">{{ ($errors->has('name'))? ($errors->first('name')):''}}</font>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $editdata->email }}">
                            <font style="color: red">{{ ($errors->has('email'))? ($errors->first('email')):''}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobile">Mobile</label>
                            <input type="number" name="mobile" class="form-control" value="{{ $editdata->mobile }}">
                            <font style="color: red">{{ ($errors->has('mobile'))? ($errors->first('mobile')):''}}</font>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobile">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $editdata->address }}">
                            <font style="color: red">{{ ($errors->has('address'))? ($errors->first('address')):''}}</font>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="Gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male"{{ ($editdata->gender=="Male")?"selected":""}}>Male</option>
                                <option value="Female"{{ ($editdata->gender=="Female")?"selected":""}}>Female</option>
                            </select>

                        </div>

                        <div class="form-group col-md-4">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image">

                        </div>
                        <div class="form-group col-md-2">
                            <img id="showImage" src="{{ (!empty($editdata->image))?url('upload/user_images/'.$editdata->image):url('upload/noImage.jpg') }}" alt="" style="width:150px; height:160px;border:1px solid black">
                        </div>


                        <div class="form-group col-md-6" style="padding-top: 30px">
                            <input type="submit" value="update" class="btn btn-primary">

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




