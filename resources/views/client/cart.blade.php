@extends('client.layouts.app')

@section('title')
Cart
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
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="categories.html">Categories</a></li>
                                    <li>Shopping Cart</li>
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
<!-- Cart Info -->
<div class="cart_info">
    <div class="container">

        <div class="row">
            <div class="col">
                <!-- Column Titles -->
                <div class="cart_info_columns clearfix">
                    <div class="cart_info_col cart_info_col_product ">Product</div>
                    <div class="cart_info_col cart_info_col_price">Price</div>
                    <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                    <div class="cart_info_col cart_info_col_total">Total</div>
                    <div class="cart_info_col cart_info_col_total">Action</div>
                </div>
            </div>
        </div>
        @if(Session::has('cart'))
            <div class="row cart_items_row">
                @foreach($products as $item)
                    <form action="{{ action('ClientController@updateCart') }}" method="post"
                        class="col">
                        <!-- Cart Item -->
                        <div
                            class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                            <!-- Name -->
                            <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_item_image">
                                    <div><img sizes="100"
                                            src="images/product/{{ $item['product_image'] }}"
                                            alt=""></div>
                                </div>
                                <div class="cart_item_name_container">
                                    <div class="cart_item_name"><a
                                            href="#">{{ $item['product_name'] }}</a></div>
                                    <div class="cart_item_edit"><a
                                            href="{{ URL::to('/removeItem/'.$item['product_id']) }}">Remove
                                            Product</a></div>
                                </div>
                            </div>
                            <!-- Price -->
                            <div class="cart_item_price">{{ $item['product_price'] }}</div>
                            <!-- Quantity -->
                            <div class="cart_item_quantity">
                                <div class="product_quantity_container ">
                                    <input id="quantity_input" name="product_quantity" type="number"
                                        value="{{ $item['qty'] }}" min="1">
                                    <input id="quantity_input" name="product_id" type="hidden"
                                        value="{{ $item['product_id'] }}">
                                </div>
                            </div>

                            <!-- Total -->
                            <div class="cart_item_total">
                                ${{ $item['product_price']*$item['qty'] }}
                            </div>
                            <input class="button update_cart_button" type="submit" value="Update">
                        </div>
                    </form>
                @endforeach
            </div>
        @else
        @endif
        <div class="row row_extra">
            <div class="col-lg-4">

                <!-- Delivery -->
                <div class="delivery">
                    <div class="section_title">Shipping method</div>
                    <div class="section_subtitle">We always free for customer</div>
                </div>

            </div>

            <div class="col-lg-6 offset-lg-2">
                <div class="cart_total">
                    <div class="section_title">Cart total</div>
                    <div class="section_subtitle">Final info</div>
                    <div class="cart_total_container">
                        <ul>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">Subtotal</div>
                            <div class="cart_total_value ml-auto">{{Session::has('cart')?Session::get('cart')->totalPrice:'0'}}</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">Shipping</div>
                                <div class="cart_total_value ml-auto">Free</div>
                            </li>
                            <li class="d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_total_title">Total</div>
                            <div class="cart_total_value ml-auto">{{Session::has('cart')?Session::get('cart')->totalPrice:'0'}}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="button checkout_button"><a href="{{URL::to('/checkout')}}">Proceed to checkout</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom')
<script src="{{ asset('frontend/js/cart.js') }}"></script>
@endsection
