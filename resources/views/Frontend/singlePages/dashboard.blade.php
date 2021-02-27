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
                    <li><a href="{{ route('order-list') }}">My Orders</a></li>
                </ul>

            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="img-circle">
                                    <img class="mx-auto d-block" src="{{ (!empty($user->image))?url('upload/user_images/'.$user->image):url('upload/noImage.jpg') }}" alt=""style="width:150px;   height:160px;border:1px solid black">
                                    <h3 class="txt-center">{{ $user->name }}</h3>
                                    <p class="txt-center">{{ $user->address }}</p>

                                </div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Mobile No</td>
                                            <td>{{ $user->mobile }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{ $user->gender }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('edit-profile') }}" class="btn btn-primary btn-block">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
