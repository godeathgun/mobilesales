<!DOCTYPE html>
<html>
<head>
<title>Mobile Sale Register</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Sign Up Form Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="frontend/resigter/css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="frontend/resigter/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
</head>
<body>
<!--header-->
	<div class="header-w3l">
		<h1>Moblie Sale Rgister</h1>
	</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
	@if(count($errors)>0)
	<div class ="alert alert-danger">
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
	
	<h2 class="sub-head">Sign Up</h2>
		<div class="sub-main">	
			<form action="#" method="post">
				<input placeholder="name" name="name" class="name" type="text" required="">
					
				<input placeholder="address" name="address" class="address" type="text" required="">
					
				<input placeholder="Phone" name="phone" class="number" type="text" required="">
					
				<input placeholder="Email" name="email" class="mail" type="text" required="">
					
				<input  placeholder="Password" name="password" class="pass" type="password" required="">
					
				<input  placeholder="Confirm Password" name="passwordAgain" class="pass" type="password" required="">

				<input type="submit" value="sign up">
			</form>
		</div>
		<div class="clear"></div>
</div>
<!--//main-->

<!--footer-->
<div class="footer-w3">
	<p>&copy; 2016 Flat Sign Up Form . All rights reserved | Design by QuanTran</a></p>
</div>
<!--//footer-->

</body>
</html>