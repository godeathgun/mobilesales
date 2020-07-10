@extends('client.layouts.app')

@section('title')
    Home
@endsection

@section('responsive')
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles/responsive.css')}}">
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
{{-- <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
        <div class=" col-md-12 heading-section text-center ftco-animate">
            
            <h2 class=" mb-4">outorid</h2>
        </div>
    </div>
</div> --}}
<div class="products">
    <div class="container">
    
        <div class="row">
            
            <div class="col">
                <div class="product_grid">

                    <!-- Product -->
                        
                  
                    @foreach ($products as $item)
                    <div class="product">

                        <div class="product_image"><img src="images/product/{{ $item->Image0 }}" alt=""></div>
                        {{-- <div class="product_extra product_new"><a href="categories.html">New</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="{{URL::to('/productdetail/'.$item->ProductID)}}">Iphone11 ProMax</a></div>
                            <div class="product_price">$670</div>
                        </div> --}}
                        <a class="btn btn-block btn-outline-primary" href="{{URL::to('/addToCart/'.$item->ProductID)}}">Add to cart</a>
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
                        <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a
                            ultricies metus.</div>
                        <div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec
                            molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="frontend/images/icon_2.svg" alt=""></div>
                    <div class="icon_box_title">Free Returns</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec
                            molestie.</p>
                    </div>
                </div>
            </div>

            <!-- Icon Box -->
            <div class="col-lg-4 icon_box_col">
                <div class="icon_box">
                    <div class="icon_box_image"><img src="frontend/images/icon_3.svg" alt=""></div>
                    <div class="icon_box_title">24h Fast Support</div>
                    <div class="icon_box_text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec
                            molestie.</p>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec
                            molestie eros</p>
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
@endsection
