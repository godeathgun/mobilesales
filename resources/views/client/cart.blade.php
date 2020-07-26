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
                    
                </div>
            </div>
        </div>
        @if(Session::has('cart'))
            <div class="row cart_items_row">
                @foreach($products as $item)
                    <form action="{{ action('CartController@updateCart') }}" method="post"
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
                                    <div class="cart_item_edit" id="remove"><a
                                            href="{{ URL::to('/removeItem/'.$item['product_id']) }}">Remove
                                            Product</a></div>
                                </div>
                            </div>
                         
                            <!-- Price -->
                            <div class="cart_item_price" gia="{{ $item['product_price'] }}">{{ number_format($item['product_price']).' ' }}</div>
                            <!-- Quantity -->
                            <div class="cart_item_quantity">
                                        {{-- <div class="product_quantity clearfix">
                                            <span>Qty</span>
                                            <input class="quantity_input" type="text" pattern="[2-9]*" value="{{ $item['qty'] }}" min="2" step="1">
                                            <div class="quantity_buttons">
                                                <div gia="" id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true" ></i></div>
                                                <div gia="" id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                            </div>
                                        </div> --}}
                                        
                                        <div class="product_quantity clearfix">
                                            <div class=" cart-quantity">
                                            <input class=" cart-quantity-input" type="number"value="{{ $item['qty'] }}" min="2" step="1">
                                            </div>
                                        </div>
                                
                            </div>

                            <!-- Total -->
                            <div class="cart_item_total">
                                ${{ $item['product_price']*$item['qty'] }}
                            </div>
                           
                        </div>
                    </form>
                @endforeach
            </div>
        @else
        <div></div>
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
{{-- <script>
function ready() {
  
    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }
}
function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}
function updateCartTotal() {
    var cart_item=document.getElementsByClassName('cart_items_row')[0]
    var cartRows=cart_item.getElementsByClassName('cart_item')
    var subTotal=0
    var total=0
    for (var i =0;i<cartRows.length;i++)
    {
        var cartRow=cartRows[i]
        var pricetext=cartRow.getElementsByClassName('cart_item_price')[0].innerHTML
        var quantityText =cartRow.getElementsByClassName('cart-quantity-input')[0].value
        var price= parseFloat(pricetext.replace(',','').replace(',',''))
        var quantity=parseFloat(quantityText)
       subTotal= price*quantity
       total+=subTotal     
      document.getElementsByClassName('cart_item_total')[0].innerText = subTotal
    }
    document.getElementsByClassName('cart_total_value')[0].innerText=total
}

</script> --}}
@endsection

