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
	
<div class="header-w3l">
    <h1>Flat Sign Up Form</h1>
</div>
<!--//header-->
<!--main-->
<div class="main-agileits">
    <h2 class="sub-head">Login</h2>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    <?php $message = Session::get('message');?>
    @if($message)
        <p class="alert alert-danger">
            <?php echo $message;
        Session::put('message',null); ?>
        </p>
    @endif

    @if(session('thongbao'))

        {{ session('thongbao') }}

    @endif

    <div class="sub-main">
        <form action="login" method="post">

            <input placeholder="Email" name="email" class="mail" type="text" required="">

            <input placeholder="Password" name="password" class="pass" type="password" required="">

            <input type="submit" value="login">

        </form>
        <div class="footer-w3">
            <p><a href="/forgotpassword">Forgot Password</a></p>
        </div>
        <div class="footer-w3">
            <p><a href="/register"> Create new account</a></p>
        </div>
    </div>
    <div class="clear"></div>
</div>

@endsection