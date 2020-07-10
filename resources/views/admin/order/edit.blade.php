@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <form action="{{ action('OrderController@edit_order') }}" method="POST"
            enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <input hidden value="{{ $order->OrderID }}" type="text" name="id" required>
            <?php
                $Status = array(
                0 => "Chờ xác nhận",
                1 => "Đã xác nhận",
                2 => "Đang giao",
                3 => "Thành công",
                4 => "Đã hủy");
            ?>
             <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Select Category</label></div>
                <div class="col-12 col-md-9">
                    <select name="order_status" id="select" class="form-control">
                        <option value="{{$order->Status}}">{{ $Status[$order->Status] }}</option>
                        <option value="0">{{$Status['0']}}</option>
                        <option value="1">{{$Status['1']}}</option>
                        <option value="2">{{$Status['2']}}</option>
                        <option value="3">{{$Status['3']}}</option>
                        <option value="4">{{$Status['4']}}</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
    </div>
    </form>
</div>
</div>
@endsection
