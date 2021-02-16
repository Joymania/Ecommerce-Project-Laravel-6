@extends('Backend.layouts.master');

@section('content')

    <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
                    @if (isset($editdata))
                        Edit Product
                        @else
                           Add Product
                    @endif

                  <a class=" float-right btn btn-success btn-sm" href="{{ route('product.view') }}"><i class="fa fa-plus-circle"></i>Product List</a>
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{ (@$editdata)? route('product.update',$editdata->id): route('product.store') }}" id="myform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                            </select>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Brand</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">Select Brand</option>
                            @foreach ($brands as $brand)
                                  <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                            </select>

                        </div>

                         <div class="col-md-4">
                        <label for="">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control"  placeholder="Write Product name"  value="{{ (@$editdata->name) }}">
                        <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Color</label>
                            <select name="color_id[]"  class="form-control select2" multiple>
                            @foreach ($colors as $color)
                                  <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach

                            </select>
                        <font color="red">{{ ($errors->has('color_id'))?($errors->first('color_id')): '' }}</font>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">Size</label>
                            <select name="size_id[]"  class="form-control select2" multiple>
                            @foreach ($sizes as $size)
                                  <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach

                            </select>
                        <font color="red">{{ ($errors->has('size_id'))?($errors->first('size_id')): '' }}</font>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Short Description</label>
                           <textarea name="short_desc" id="short_desc" class="form-control" ></textarea>
                        <font color="red">{{ ($errors->has('short_desc'))?($errors->first('short_desc')): '' }}</font>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="">Long Description</label>
                           <textarea name="long_desc" id="long_desc" class="form-control" rows="5" ></textarea>
                        <font color="red">{{ ($errors->has('long_desc'))?($errors->first('long_desc')): '' }}</font>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Price</label>
                         <input type="number" name="price" id="price" class="form-control">
                        <font color="red">{{ ($errors->has('price'))?($errors->first('price')): '' }}</font>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Image</label>
                         <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <img id="showImage" src="{{ (!empty($editdata->image))?url('upload/Product_images/'.$editdata->image):url('upload/noImage.jpg') }}" alt="" style="width:100px; height:100px;border:1px solid black">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Sub Image</label>
                         <input type="file" name="sub_image[]" id="sub_image[]" class="form-control" multiple>
                        </div>


                        <div class="form-group col-md-12" style="padding-left: 10px;padding-top:30px">
                            <input type="submit" class="btn btn-primary" value="{{ (@$editdata)? "Update": "Submit" }}">

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
          category_id: {
            required: true,
          },
          brand_id: {
            required: true,
          },
          short_desc: {
            required: true,
          },
          long_desc: {
            required: true,
          },
          price: {
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
    <script>
        $(function(){
          //Initialize Select2 Elements
      $('.select2').select2();
        });
    </script>

@endsection




