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
        Customer Profile
    </h2>
</section>


    <div class="container">
        <div class="row" style="padding: 15px 0px 15px 0px">
            <div class="col-md-2">
                <ul class="prof">
                    <li><a href="">My Profile</a></li>
                    <li><a href="">Password Change</a></li>
                    <li><a href="">My Orders</a></li>
                </ul>

            </div>
                <div class="card-body">
                    <form method="post" action="{{ route('update-profile') }}" id="myform" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">

                             <div class="form-group col-md-4">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" required >
                                <font style="color: red">{{ ($errors->has('name'))? ($errors->first('name')):''}}</font>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                <font style="color: red">{{ ($errors->has('email'))? ($errors->first('email')):''}}</font>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile">Mobile</label>
                                <input type="number" name="mobile" class="form-control" value="{{ $user->mobile }}" required>
                                <font style="color: red">{{ ($errors->has('mobile'))? ($errors->first('mobile')):''}}</font>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mobile">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
                                <font style="color: red">{{ ($errors->has('address'))? ($errors->first('address')):''}}</font>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="Gender">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="Male"{{ ($user->gender=="Male")?"selected":""}}>Male</option>
                                    <option value="Female"{{ ($user->gender=="Female")?"selected":""}}>Female</option>
                                </select>

                            </div>

                            <div class="form-group col-md-4">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">

                            </div>
                            <div class="form-group col-md-2">
                                <img id="showImage" src="{{ (!empty($user->image))?url('upload/user_images/'.$user->image):url('upload/noImage.jpg') }}" alt="" style="width:150px; padding-right:130%; height:160px;border:1px solid black">
                            </div>


                            <div class="form-group col-md-12" style="padding-top: 30px">
                                <input type="submit" value="update" class="btn btn-primary">

                            </div>

                        </div>

                    </form>
                  </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
          $('#myform').validate({
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
              address: {
                required: true,
              },
              gender: {
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
