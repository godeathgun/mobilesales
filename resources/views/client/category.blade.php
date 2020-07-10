@extends('client.layouts.app')

@section('title')
    Category
@endsection

@section('responsive')
<link rel="stylesheet" type="text/css" href="frontend/styles/categories.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/categories_responsive.css">
@endsection

@section('slide')
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(frontend/images/categories.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Smart Phones<span>.</span></div>
								<div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>   
@endsection

@section('content')
<?php $all_manufa=DB::table('manufacturer')->get(); ?>
<!-- Products -->
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">
        <!-- Product Sorting -->
                <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                    <div class="results">Showing <span>12</span> results</div>
                         <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                            <ul class="item_sorting">
                                <li>
                                    <span class="sorting_text">Sort by</span>
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    <ul>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                    <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <div class="product_grid">
                    <!-- Product -->
                    @foreach ($products as $product)
                    <div class="product">
                        <div class="product_image"><img src="images/product/{{$product->Image0}}" alt=""></div>
                        <div class="product_extra product_new"><a href="categories.html">New</a></div>
                        <a class="btn btn-block btn-outline-primary" href="{{URL::to('/addToCart/'.$product->ProductID)}}">Add to cart</a>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">{{$product->ProductName}}</a></div>
                            <div class="product_price">{{$product->Price}}đ</div>
                        </div>
                        
                    </div>
                    @endforeach
                    <!-- Product -->
                    <!-- Product -->
                </div>
                <div class="text-center">
                <div class="product_pagination justify-content-center">
                    <ul>
                        {{$products->links()}}
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
 
@endsection

@section('custom')
<script src="frontend/js/categories.js"></script>
@endsection