
@extends('client.layouts.app')
@section('title')
Contact
@endsection
@section('responsive')
<link href="frontend/resigter/css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="frontend/resigter/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="frontend/styles/checkout.css">
<link rel="stylesheet" type="text/css" href="frontend/styles/checkout_responsive.css">
@endsection
@section('content')
	

<!--header-->
	<div class="header-w3l">
		<h1>Flat Sign Up Form</h1>
	</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
    <h2 class="sub-head">Sign Up</h2>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
        @endif

        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
		<div class="sub-main">	
			<form action="register" method="post">
				<input placeholder="name" name="name" class="name" type="text" required="">
					<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="address" name="address" class="name2" type="text" required="">
					<span class="icon2"><i class="fa fa-user" aria-hidden="true"></i></span><br>
				<input placeholder="phone" name="phone" class="number" type="text" required="">
					<span class="icon3"><i class="fa fa-phone" aria-hidden="true"></i></span><br>
				<input placeholder="email" name="email" class="mail" type="text" required="">
					<span class="icon4"><i class="fa fa-envelope" aria-hidden="true"></i></span><br>
				<input  placeholder="password" name="password" class="pass" type="password" required="">
					<span class="icon5"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				<input  placeholder="passwordAgain" name="passwordAgain" class="pass" type="password" required="">
					<span class="icon6"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>
				
				<input type="submit" value="sign up">
			</form>
		</div>
		<div class="clear"></div>
</div>
@endsection