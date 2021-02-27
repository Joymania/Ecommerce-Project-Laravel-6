@extends('Backend.layouts.master');

@section('content')

    <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Approved List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Approved List</li>
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
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order NO</th>
                            <th>Total Ammount</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                         @foreach ($orders as $order)

                         <tr>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->order_total }}</td>
                                <td>{{ $order['payment']['payment_method'] }}
                                @if ($order['payment']['payment_method']=='Bkash')
                                    <span> (Transaction No:{{ $order['payment']['transaction'] }})</span>
                                @endif
                                </td>

                                <td>
                                    @if ($order->status==1)
                                        <span style="background: green; color:white;">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('details-order',$order->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye">Details</i></a>

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




