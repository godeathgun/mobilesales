@extends('client.layouts.app')
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
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Order index </h2>
            &nbsp;
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ShipName</label></div>
                <p>{{ $order->ShipName }}
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ShipMobile</label></div>
                <p>{{ $order->ShipMobile }}
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ShipAddress</label></div>
                <p>{{ $order->ShipAddress }}
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">OrderItem</th>
                        <th scope="col">ProductName</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <?php $TotalPrice = 0 ?>
                <tbody>
                    @foreach($orderdetails as $item)
                        <tr>
                            <th scope="row">{{ $item->OrderItem }}</th>
                            <td>{{ DB::table('product')->where('ProductID',$item->ProductID)->first()->ProductName }}x{{ $item->Quantity }}
                            </td>
                            <td>{{ $item->Price }}</td>
                            <?php $TotalPrice += $item->Price ?>
                        </tr>
                    @endforeach
                </tbody>
                <tbody>
                    <tr>
                        <th scope="row">Subtotal</th>
                        <td></td>
                        <td>{{ $TotalPrice }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Ship Fee</th>
                        <td></td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <th scope="row">Total</th>
                        <td></td>
                        <td>{{ $TotalPrice }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('custom')
<script src="{{asset('frontend/js/product.js')}}"></script>    
@endsection
