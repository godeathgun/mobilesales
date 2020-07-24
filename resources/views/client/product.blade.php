@extends('client.layouts.app')

@section('title')
    Product
@endsection

@section('responsive')
<link rel="stylesheet" type="text/css" href={{asset('frontend/styles/product.css')}}>
<link rel="stylesheet" type="text/css" href={{asset('frontend/styles/product_responsive.css')}}>
@endsection

@section('slide')
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url({{asset('frontend/images/categories.jpg')}})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Smart Phones<span>.</span></div>
								<div class="home_text"><p>Mua hàng theo cách của bạn</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>    
@endsection

@section('content')
<!-- Product Details -->

<div class="product_details">
    <div class="container">
        <div class="row details_row">

            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="details_image">
                    {{-- <div class="details_image_large"><img src="{{asset('frontend/images/details_1.jpg')}}" alt=""><div class="product_extra product_new"><a href="categories.html">New</a></div></div>
                    <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                        <div class="details_image_thumbnail active" data-image="frontend/images/details_1.jpg"><img src="{{asset('frontend/images/details_1.jpg')}}" alt=""></div>
                        <div class="details_image_thumbnail" data-image="frontend/images/details_1.jpg"><img src="{{asset('frontend/images/details_1.jpg')}}" alt=""></div>
                        <div class="details_image_thumbnail" data-image="frontend/images/details_1.jpg"><img src="{{asset('frontend/images/details_2.jpg')}}" alt=""></div>
                        <div class="details_image_thumbnail" data-image="frontend/images/details_1.jpg"><img src="{{asset('frontend/images/details_3.jpg')}}" alt=""></div>
                    </div> --}}
                    
                    <div class="details_image_large"><img src="/images/product/{{ $products->Image0 }}" alt=""><div class="product_extra product_new"><a href="categories.html">New</a></div></div>
						<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							<div class="details_image_thumbnail active" data-image="/images/product/{{$products->Image0}}"><img src="/images/product/{{ $products->Image0}}" alt=""></div>
							<div class="details_image_thumbnail" data-image="/images/product/{{ $products->Image1 }}"><img src="/images/product/{{ $products->Image1 }}" alt=""></div>
							<div class="details_image_thumbnail" data-image="/images/product/{{ $products->Image2 }}"><img src="/images/product/{{ $products->Image2 }}" alt=""></div>
							<div class="details_image_thumbnail" data-image="/images/product/{{ $products->Image3 }}"><img src="/images/product/{{ $products->Image3 }}" alt=""></div>
						</div>
                </div>
            </div>

       <!-- Product Content -->
            <div class="col-lg-6">
                <div class="fs-dttop">
                    <h2>{{$products->ProductName}}</h2>
                </div>
                {{-- <div class="details_content">
                    <div class="details_name">{{$products->ProductName}}</div>
                    
                    <div class="details_price">{{number_format($products->Price).' '.'VND'}}</div>
                    

                    <!-- In Stock -->
                    <div class="in_stock_container">
                        <div class="availability">Availability:</div>
                        <span>{{$products->InStock}}</span>
                    </div>
                    <div class="details_text">
                        <p> sad a</p>
                    </div>
                    <div class="details_text">
                        <p> sad a</p>
                    </div>
                    <div class="details_text">
                        <p> sad a</p>
                    </div>
                    <!-- Product Quantity -->
                    <div class="product_quantity_container">
                        <div class="product_quantity clearfix">
                            <span>Qty</span>
                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                            </div>
                        </div>
                        <div class="button cart_button" data-toggle="modal" data-target="#cart"><a href="#">Add to cart</a></div>
                    </div>

                    <!-- Share -->
                    <div class="details_share">
                        <span>Share:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="fs-tsright">
                    <ul>
                        <div class="details_name">Thông số kỹ thuật</div>
                        <li> <label>Màn hình :</label> <span>{{$products->Screen}}</span> </li>
                                    <li> <label>Camera trước :</label> <span>{{$products->FrontCamera}}</span> </li>
                                    <li> <label>Camera sau :</label> <span>{{$products->Camera}}</span> </li>
                                    <li> <label>RAM :</label> <span>{{$products->Ram}}</span> </li>
                                    <li> <label>Bộ nhớ trong :</label> <span>{{$products->ROM}}</span> </li>
                                    <li> <label>CPU :</label> <span>{{$products->CPU}}</span> </li>
                                    <li> <label>GPU :</label> <span>{{$products->GPU}}</span> </li>
                                    <li> <label>Dung lượng pin :</label> <span>{{$products->Battery}}</span> </li>
                                    <li> <label>Hệ điều hành :</label> <span>{{$products->OS}}</span> </li>
                                    <li> <label>Thẻ SIM :</label> <span>{{$products->Sim}}</span> </li>
                                                    {{-- <li> <label>Xuất xứ :</label> <span>Việt Nam</span> </li> --}}
                            <li> <label>Năm sản xuất :</label> <span>{{$products->YearReleased}}</span> </li>
                </ul>
                </div>
                <div class="product_quantity_container">
                        {{-- <div class="product_quantity clearfix">
                            <span>Qty</span>
                            <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                            <div class="quantity_buttons">
                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                            </div>
                        </div> --}}
                        @if(Session::has('userLogin'))
                        <a class="btn btn-block btn-outline-primary" href="{{URL::to('/addCart/'.$products->ProductID)}}">Add to cart</a>
                        {{-- <a class="btn btn-block btn-outline-primary" href="{{URL::to('/addToCart/'.$item->ProductID)}}">Add to cart</a> --}}
                        @else
                        <?php Session::put('message',"Bạn phải đăng nhập để mua hàng");?>
                        <a class="btn btn-block btn-outline-primary" href="/login">Add to cart</a>
                        @endif
                        {{-- <div class="add-to-cart button cart_button" ><a href="{{URL::to('/addToCart/'.$products->ProductID)}}">Add to cart</a></div> --}}
                        {{-- <div class="add-to-cart button cart_button">
                            <a href="{{URL::to('/addToCart/'.$products->ProductID)}}">Add to cart</a>
                        </div> --}}
                    </div>

            </div>
            </div>

            <div class="row description_row">
            <div class="col">
                <div class="description_title_container">
                    <div class="description_title">Description</div>
                    <div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>
                </div>
                <div class="description_text">
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
                </div>
            </div>
            </div>
            </div>
            </div>

            <!-- Products -->

            <div class="products">
            <div class="container">
            <div class="row">
            <div class="col text-center">
                <div class="products_title">Related Products</div>
            </div>
            </div>
            <div class="row">
            <div class="col">
                
                <div class="product_grid">
                    
                    <!-- Product -->
                    @foreach ($relatives as $item)
                    <div class="product">
                        <div class="product_image"><img src="/images/product/{{ $item->Image0 }}" alt=""></div>
                        <div class="product_extra product_new"><a href="categories.html">New</a></div>
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
            <!-- Modal -->
            
@endsection

@section('custom')
<script src="{{asset('frontend/js/product.js')}}"></script>  
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
    function addToCarts(id){
      $.ajax({
          url:'addToCart/'+id,
          type: 'GET',
      }).done(function(respone){
          console.log(respone);
          $("#change-item-cart").empty();
          $("#change-item-cart").html(respone);
      });
    }
    
</script>  
@endsection