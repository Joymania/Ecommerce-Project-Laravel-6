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
                    Contact List

                      <a class=" float-right btn btn-success btn-sm" href="{{ route('contact.add') }}"><i class="fa fa-plus-circle"></i>Add Contact</a>


                </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Address</th>
                            <th>Mobile No</th>
                            <th>Email</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Youtube</th>
                            <th>Google Plus</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alldata as $key=> $contact)
                        <tr>
                            <td>{{$key+1 }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->mobile_no }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->facebook }}</td>
                            <td>{{ $contact->twitter }}</td>
                            <td>{{ $contact->youtube }}</td>
                            <td>{{ $contact->google_plus }}</td>
                            <td>
                                <a href="{{ route('contact.edit',$contact->id) }}" title="edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('contact.delete',$contact->id) }}" title="delete" id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
              </div>
            </div>

          </section>
        </div>

      </div>
    </section>

  </div>

@endsection




