@extends('client.partials.userinfo')
@section('infocontent')
<div class="content">

    <div class="card-body card-block">
        <form action="{{ action('ClientController@infoCustomer') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-9">
                    <label for="cname" class=" form-control-label">Customer Name</label>
                    <input hidden value="{{$customer->CustomerID}}" id="cname" class="form-control" name="customer_id" type="text" required>
                <input value="{{$customer->CustomerName}}" id="cname" class="form-control" name="customer_name" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-9">
                    <label for="cname" class=" form-control-label">Email</label>
                    <input disabled value="{{$customer->Email}}" id="cname" class="form-control" name="customer_email" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-9">
                    <label for="cname" class=" form-control-label">Address</label>
                    <input value="{{$customer->Address}}" id="cname" class="form-control" name="customer_address" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-9">
                    <label for="cname" class=" form-control-label">Phone</label>
                    <input value="{{$customer->Phone}}" id="cname" class="form-control" name="customer_phone" type="text" required>
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