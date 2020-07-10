@extends('client.layouts.app')
@section('title')
Checkout
@endsection
@section('responsive')
<link rel="stylesheet" type="text/css" href="frontend/styles/checkout.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/checkout_responsive.css">
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
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="cart.html">Shopping Cart</a></li>
                                    <li>Checkout</li>
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
<!-- Checkout -->

<div class="checkout">
    <div class="container">
        <div class="row">

            <!-- Billing Info -->
            <div class="col-lg-6">
                <div class="billing checkout_section">
                    <div class="section_title">Billing Address</div>
                    <div class="section_subtitle">Enter your address info</div>
                    <div class="checkout_form_container">
                        @if(Session::has('userLogin'))
                        <form action="/addOrder" id="checkout_form" class="checkout_form">
                            <div>
                                <!-- Name -->
                                <label for="checkout_company">Name</label>
                                <input value="{{Session::get('userLogin')->CustomerName}}" type="text" id="checkout_company" required="required" name="customer_name" class="checkout_input">
                            </div>
                            <div>
                                <!-- Address -->
                                <label for="checkout_address">Address*</label>
                                <input value="{{Session::get('userLogin')->Address}}" type="text" id="checkout_address" class="checkout_input" name="customer_address"  required="required">

                            </div>
                            <div>
                                <!-- Phone no -->
                                <label for="checkout_phone">Phone no*</label>
                                <input value="{{Session::get('userLogin')->Phone}}" type="phone" id="checkout_phone" class="checkout_input" name="customer_phone" required="required">
                            </div>
                            <div>
                                <!-- Email -->
                                <label for="checkout_email">Email Address*</label>
                                <input value="{{Session::get('userLogin')->Email}}" type="phone" id="checkout_email" class="checkout_input" name="customer_email" required="required">
                            </div>
                            <div>
                                <!-- Note -->
                                <label for="checkout_email">Note</label>
                                <input type="text" id="checkout_email" class="checkout_input" name="customer_note">
                            </div>
                            <input class="button order_button" value="Place Order" type="submit">
                        </form>
                        @else
                        <form action="#" id="checkout_form" class="checkout_form">
                            <div class="checkout_extra">
                                <div>
                                    <input type="checkbox" id="checkbox_account" name="regular_checkbox"
                                        class="regular_checkbox">
                                    <a href="register" class="btn btn-dark">Create an account</a>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Order Info -->

            <div class="col-lg-6">
                <div class="order checkout_section">
                    <div class="section_title">Your order</div>
                    <div class="section_subtitle">Order details</div>

                    <!-- Order details -->
                    <div class="order_list_container">
                        <div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
                            <div class="order_list_title">Product</div>
                            <div class="order_list_value ml-auto">Total</div>
                        </div>
                        <ul class="order_list">
                            @if(Session::has('cart'))
                            <?php $totalprice = 0; ?>
                                @foreach ($products as $item)
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="order_list_title">{{$item['product_name']}}x{{$item['qty']}}</div>
                                        <div class="order_list_value ml-auto">${{ $item['product_price']*$item['qty'] }}</div>
                                    </li>
                                    <?php $totalprice+=$item['product_price']*$item['qty'] ?>
                                @endforeach
                            @endif
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Subtotal</div>
                                <div class="order_list_value ml-auto">{{$totalprice}}</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Shipping</div>
                                <div class="order_list_value ml-auto">Free</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="order_list_title">Total</div>
                                <div class="order_list_value ml-auto">{{$totalprice}}</div>
                            </li>
                        </ul>
                    </div>

                    <!-- Payment Options -->
                    <div class="payment">
                        <div class="payment_options">
                            <label class="payment_option clearfix">Payment on delivery
                                <span class="checkmark"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom')
<script src="frontend/js/checkout.js"></script>
@endsection