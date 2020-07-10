<!DOCTYPE html>
<html>
<head>
<title>Mobile Sales</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Flat Sign Up Form Responsive Widget Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link href="frontend/register/css/style.css" rel="stylesheet" type="text/css" media="all">
<link href="frontend/register/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<!-- //css files -->
<!-- online-fonts -->
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Raleway+Dots' rel='stylesheet' type='text/css'>
</head>
<body>
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
<!--//main-->

<!--footer-->
<div class="footer-w3">
	<p>&copy; 2016 Flat Sign Up Form . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>
<!--//footer-->

</body>
</html>