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
    <h2 class="sub-head">Reset Password</h2>
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif

    @if(session('thongbao'))

        {{ session('thongbao') }}

    @endif

    <div class="sub-main">
        <form action=" /resetpassword " method="post">
            <input value="Email" name="Email" class="mail" type="text" hidden>
            <input placeholder="Code" name="code" class="mail" type="text" required="">
            <input placeholder="New Passoword" name="new_password" class="mail" type="password" required="">
            <input placeholder="Confirm Password" name="confirm_password" class="mail" type="password" required="">
            <input type="submit" value="Reset Password">
        </form>
    </div>
    <div class="clear"></div>
</div>

@endsection