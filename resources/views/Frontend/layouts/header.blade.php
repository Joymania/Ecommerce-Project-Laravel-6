<!DOCTYPE html>
<html lang="en">
<head>
	<title>E-Commerce Project</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>



	<link rel="icon" type="image/png" href="{{ asset('Frontend') }}/images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('Frontend') }}/css/main.css">
    <style type="text/css">
        .notifyjs-corner{
            z-index: 10000 !important;
        }
      </style>
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<div class="left-top-bar">
							<font size="3px" color="#fff">
		                        {{ $contact->mobile_no }} &nbsp;&nbsp;&nbsp;
		                        {{ $contact->email }}
		                    </font>
						</div>
					</div>

					<div class="right-top-bar flex-w h-full">
						<ul class="social">
	                        <li class="facebook"><a href="{{ $contact->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
	                        <li class="twitter"><a href="{{ $contact->twitter }}"target="_blank"><i  class="fa fa-twitter"></i></a></li>
	                        <li class="google-plus"><a href="{{ $contact->google_plus }}" target="_blank" ><i class="fa fa-google-plus"></i></a></li>
	                        <li class="youtube"><a href="{{ $contact->youtube }}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
	                    </ul>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="{{ route('index') }}" class="logo">
						<img src="{{ url('upload/Logo_images/'.$logo->image) }}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
	                        <li class="active-menu">
	                            <a href="{{ route('index') }}">HOME</a>
	                        </li>
	                        <li class="active-menu">
	                            <a href="#">SHOPS</a>
	                            <ul class="sub-menu">
	                                <li><a href="{{ route('productlist') }}">Products</a></li>
	                                <li><a href="shoping-cart.html">Checkout</a></li>
	                                <li><a href="{{ route('shoppingcart') }}">Cart</a></li>
	                            </ul>
	                        </li>
	                        <li>
	                            <a href="{{ route('aboutUs') }}">ABOUT US</a>
	                        </li>
	                        <li>
	                            <a href="{{ route('contactUs') }}">CONTACT US</a>
	                        </li>

	                        <li><a href="{{ route('customer-login') }}">LOGIN</a></li>
	                    </ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.html"><img src="{{ url('upload/Logo_images/'.$logo->image) }}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						<font size="3px" color="#fff">
	                        {{ $contact->mobile_no }} &nbsp;&nbsp;&nbsp;
	                        {{ $contact->email }}
	                    </font>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<ul class="social">
	                        <li class="facebook"><a href="{{ $contact->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
	                        <li class="twitter"><a href="{{ $contact->twitter }}"target="_blank"><i  class="fa fa-twitter"></i></a></li>
	                        <li class="google-plus"><a href="{{ $contact->google_plus }}" target="_blank" ><i class="fa fa-google-plus"></i></a></li>
	                        <li class="youtube"><a href="{{ $contact->youtube }}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
	                    </ul>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li><a href="index.html">Home</a></li>
				<li>
					<a href="">SHOPS</a>
					<ul class="sub-menu-m">
						<li><a href="">Products</a></li>
                        <li><a href="">Checkout</a></li>
                        <li><a href="">Cart</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
				<li>
                    <a href="">ABOUT US</a>
                </li>
                <li>
                    <a href="contact.html">CONTACT US</a>
                </li>
                <li><a href="">LOGIN</a></li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset('Frontend') }}/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>


{{-- Cart////////////// --}}


    <div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
                    @php
                            $contents=Cart::content();
                            $total=0;
                        @endphp
                        @foreach ($contents as $content)
                            <li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{ asset('upload/Product_images/'.$content->options->image) }}" alt="IMG">
						</div>


						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								{{ $content->name }}
							</a>

							<span class="header-cart-item-info">
								{{ $content->qty }}x{{ $content->price }} tk
							</span>
						</div>
					</li>
                    @php
                        $total+=$content->subtotal;
                    @endphp
                        @endforeach


				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: {{ $total }} tk
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="{{ route('shoppingcart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
