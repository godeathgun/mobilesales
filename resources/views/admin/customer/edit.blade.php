@extends('admin.layouts.app')

@section('content')
<div class="content">
    <h2> Customer edit </h2>
    &nbsp;
    <div class="card-body card-block">
        <form action="{{ action('CustomerController@edit_customer') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Customer Name</label>
                    <input hidden value="{{$select_customer->CustomerID}}" id="cname" class="form-control" name="customer_id" type="text" required>
                <input value="{{$select_customer->CustomerName}}" id="cname" class="form-control" name="customer_name" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Password</label>
                    <input value="{{$select_customer->Password}}" id="cname" class="form-control" name="customer_password" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Email</label>
                    <input value="{{$select_customer->Email}}" id="cname" class="form-control" name="customer_email" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Address</label>
                    <input value="{{$select_customer->Address}}" id="cname" class="form-control" name="customer_address" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Phone</label>
                    <input value="{{$select_customer->Phone}}" id="cname" class="form-control" name="customer_phone" type="text" required>
                </div>
            </div>


            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="checkbox">
                            <label for="checkbox1" class="form-check-label ">
                            <input type="checkbox" id="checkbox1" name="customer_status" value="{{$select_customer->Status}}"
                                    class="form-check-input">True
                            </label>
                        </div>
                    </div>
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
