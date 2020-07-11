@extends('client.layouts.app')

@section('title')
    User Info
@endsection

@section('responsive')
<link rel="stylesheet" type="text/css" href="frontend/styles/cart.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/cart_responsive.css">
@endsection
@section('slide')
<!-- Home -->

<div class="home">
    <div class="home_container">
        <div class="home_background" style="background-image:url(frontend/images/cart.jpg)"></div>
        <div class="home_content_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li>User Info</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

        {{-- <ul class="nav nav-tabs ">
            <li class="list-group-item">
              <a class="nav-link" href="/cusInfo">Info</a>
            </li>
            <li class="list-group-item">
              <a class="nav-link" href="/changepassword">Change Password</a>
            </li>
            <li class="list-group-item">
              <a class="nav-link" href="/vieworder">Orders</a>
            </li>
        </ul> --}}
        <div class="product_details">
            <div class="container">
                <div class="row details_row">
                    <div class="col-lg-3">.
                        <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                            <a href="cusInfo" class="list-group-item">Info</a>
                            <a href="changePassword" class="list-group-item">Change Password</a>
                            <a href="userorder" class="list-group-item">Orders</a>
                            </ul>
                            
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="cart">
                        @yield('infocontent')
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
          
    
@endsection

@section('custom')
<script src="{{ asset('frontend/js/cart.js') }}"></script>
@endsection