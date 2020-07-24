@extends('client.layouts.app')

@section('title')
    Home
@endsection

@section('responsive')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/shopcart.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/alertify.css')}}">
@endsection

@section('slide')

<div class="home">
    <div class="home_slider_container">
        <?php $banners = DB :: table('banner')->get();?>
        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">
            @foreach ($banners as $item)
                
           
            <!-- Slider Item -->
            <div class="owl-item home_slider_item">
                <div class="home_slider_background" style="background-image:url(images/banner/{{$item->Image}})">
                </div>
                <div class="home_slider_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_slider_content" data-animation-in="fadeIn"
                                    data-animation-out="animate-out fadeOut">
                                    <div class="home_slider_title"></div>
                                    <div class="home_slider_subtitle"></div>
                                    <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Slider Item -->
            

            <!-- Slider Item -->
            

        </div>

        <!-- Home Slider Dots -->

        <div class="home_slider_dots_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_slider_dots">
                            <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                <li class="home_slider_custom_dot active">01.</li>
                                <li class="home_slider_custom_dot">02.</li>
                                <li class="home_slider_custom_dot">03.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection
@section('content')
<div class="products">
    <div class="container">
    
        <div class="row">
            
            <div class="col">
                <div class="product_grid">

                    <!-- Product -->
                        
                  
                    @foreach ($products as $item)
                    <div class="product">

                        <div class="product_image"><img src="images/product/{{ $item->Image0 }}" alt=""></div>
                        @if(Session::has('userLogin'))
                        <a class="btn btn-block btn-outline-primary"  onclick="addToCart({{$item->ProductID}})" href="javascript:">Add to cart</a>
                        @else
                        <?php Session::put('message',"Bạn phải đăng nhập để mua hàng");?>
                        <a class="btn btn-block btn-outline-primary" href="/login">Add to cart</a>
                        @endif

                        {{-- <a class="btn btn-block btn-outline-primary"  onclick="addToCart({{$item->ProductID}})" href="javascript:">Add to cart</a> --}}
                        <div class="product_content">
                            <div class="product_title"><a href="{{URL::to('/productdetail/'.$item->ProductID)}}">{{$item->ProductName}}</a></div>
                            <div class="product_price">{{number_format($item->Price).' '.'VND'}}</div>
                            
                        </div>
                    </div>
                    @endforeach
                  
                    <!-- Product -->
                    
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Ad -->

<div class="avds_xl">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="avds_xl_container clearfix">
                    <div class="avds_xl_background" style="background-image:url(frontend/images/avds_xl.jpg)"></div>
                    <div class="avds_xl_content">
                        <div class="avds_title">Amazing Devices</div>
                        <div class="avds_text">Theo dõi các sản phẩm mới của cửa hàng. Cùng mua sắm cho ngày hè bận rộn. Chúc các bạn mua hàng vui vẻ</div>
                        {{-- <div class="avds_link avds_xl_link"><a href="">See More</a></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Icon Boxes -->

<div class="icon_boxes">
    <div class="container">
        <div class="row icon_box_row">

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="frontend/images/icon_1.svg" alt=""></div>
                    <div class="icon_box_title">Free Shipping Worldwide</div>
                    <div class="icon_box_text">
                        <p>Free ship for the first time buy</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="frontend/images/icon_2.svg" alt=""></div>
                    <div class="icon_box_title">Free Returns</div>
                    <div class="icon_box_text">
                        <p>Bao đôi trả sản phẩm trong vòng 15 ngày kể từ khi xuất hóa đơn.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="frontend/images/icon_3.svg" alt=""></div>
                    <div class="icon_box_title">24h Fast Support</div>
                    <div class="icon_box_text">
                        <p>Nhân viên hỗ trợ nhanh và thân thiện 24/7</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="newsletter_border"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="newsletter_content text-center">
                    <div class="newsletter_title">Subscribe to our newsletter</div>
                    <div class="newsletter_text">
                        <p>Theo dõi của hàng để nhận những ưu đãi mới của cửa hàng. Cảm ơn Quý Khách đã ghé thăm Website của chúng tôi.</p>
                    </div>
                    <div class="newsletter_form_container">
                        <form action="#" id="newsletter_form" class="newsletter_form">
                            <input type="email" class="newsletter_input" required="required">
                            <button class="newsletter_button trans_200"><span>Subscribe</span></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom')

<script src="{{asset('frontend/js/custom.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script>
    function addToCart(id){
      $.ajax({
          url:'addToCart/'+id,
          type: 'GET',
      }).done(function(respone){
          console.log(respone);
          $("#change-item-cart").empty();
          $("#change-item-cart").html(respone);
          alertify.success('Thêm sản phẩm thành công');
      });
    }
</script>
@endsection
