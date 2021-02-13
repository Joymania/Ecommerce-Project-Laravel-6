@extends('Backend.layouts.master');

@section('content')

    <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                        Edit Category
                        @else
                           Add Category
                    @endif

                  <a class=" float-right btn btn-success btn-sm" href="{{ route('category.view') }}"><i class="fa fa-plus-circle"></i>Category List</a>
                </h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{ (@$editdata)? route('category.update',$editdata->id): route('category.store') }}" id="myform" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row col-md-6">
                        <label for="description">Category Name</label>
                        <input type="text" id="name" class="form-control" name="name" placeholder="Write Category name" required>
                        <font color="red">{{ ($errors->has('name'))?($errors->first('name')): '' }}</font>
                    </div>

                        <div class="form-group col-md-6" style="padding-left: 10px;padding-top:30px">
                            <input type="submit" class="btn btn-primary" value="{{ (@$editdata)? "Update": "Submit" }}">

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




