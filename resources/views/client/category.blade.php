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
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_1.jpg" alt=""></div>
                        <div class="product_extra product_new"><a href="categories.html">New</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$670</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_2.jpg" alt=""></div>
                        <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$520</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_3.jpg" alt=""></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$710</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_4.jpg" alt=""></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$330</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_5.jpg" alt=""></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$170</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_6.jpg" alt=""></div>
                        <div class="product_extra product_hot"><a href="categories.html">Hot</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$240</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_7.jpg" alt=""></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$70</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_8.jpg" alt=""></div>
                        <div class="product_extra product_sale"><a href="categories.html">Hot</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$490</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_9.jpg" alt=""></div>
                        <div class="product_extra product_sale"><a href="categories.html">Hot</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$410</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_10.jpg" alt=""></div>
                        <div class="product_extra product_sale"><a href="categories.html">Hot</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$365</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_11.jpg" alt=""></div>
                        <div class="product_extra product_sale"><a href="categories.html">Hot</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$195</div>
                        </div>
                    </div>

                    <!-- Product -->
                    <div class="product">
                        <div class="product_image"><img src="frontend/images/product_12.jpg" alt=""></div>
                        <div class="product_extra product_sale"><a href="categories.html">Hot</a></div>
                        <div class="product_content">
                            <div class="product_title"><a href="product.html">Smart Phone</a></div>
                            <div class="product_price">$580</div>
                        </div>
                    </div>

                </div>
                <div class="product_pagination">
                    <ul>
                        <li class="active"><a href="#">01.</a></li>
                        <li><a href="#">02.</a></li>
                        <li><a href="#">03.</a></li>
                    </ul>
                </div>
                    
            </div>
        </div>
    </div>
</div>   
@endsection

@section('custom')
<script src="frontend/js/categories.js"></script>
@endsection