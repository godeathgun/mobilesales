@extends('client.partials.userinfo')
@section('infocontent')
<div class="content">

    <div class="card-body card-block">
        <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
        <form action="{{ action('ClientController@changePassword') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-9">
                    <label for="cname" class=" form-control-label">Old Password</label>
                    <input hidden value="{{$customer->CustomerID}}" id="cname" class="form-control" name="customer_id" type="text" required>
                <input id="cname" class="form-control" name="old_password" type="password" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-9">
                    <label for="cname" class=" form-control-label">New Password</label>
                    <input  id="cname" class="form-control" name="new_password" type="password" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-9">
                    <label for="cname" class=" form-control-label">Confirm Password</label>
                    <input id="cname" class="form-control" name="confirm_password" type="password" required>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection