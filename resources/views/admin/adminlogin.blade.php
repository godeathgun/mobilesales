<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Flat Sign Up Form Responsive Widget Template| Home :: W3layouts</title>
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
		<h1>Login Mobiles</h1>
	</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
    <h2 class="sub-head">Login</h2>
        @if(count($errors)>0)
        <div class ="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
        @endif

        @if(session('thongbao'))
            
                {{session('thongbao')}}
            
        @endif

		<div class="sub-main">	
			<form action="adminlogin" method="post">
  
				<input placeholder="email" name="email" class="mail" type="text" required="">

				<input  placeholder="Password" name="password" class="pass" type="password" required="">

				<input type="submit" value="login">
				
			</form>
			<div class="footer-w3">
				<p>Forgot <a href="#">Password</a></p>
			</div>
		
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