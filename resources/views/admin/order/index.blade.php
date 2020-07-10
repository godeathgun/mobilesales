@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Order index </h2>
            &nbsp;
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <form action="search_manufacturer" method="get" enctype="multipart/form-data" class="form-horizontal" >
                <div class="input-group">
                    <input  type="text" id="input1-group2" name="input_data" placeholder="Search" class="form-control">
                    <div class="input-group-btn">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>
                </div>
            </form>
            &nbsp;
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">OrderID</th>
                        <th scope="col">OrderDate</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
               
                <tbody>
                    <?php
                        $Status = array(
                        0 => "Chờ xác nhận",
                        1 => "Đã xác nhận",
                        2 => "Đang giao",
                        3 => "Thành công",
                        4 => "Đã hủy");
                    ?>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->OrderID }}</th>
                            <td>{{ $order->OrderDate }}</td>

                            <td>{{ $Status[$order->Status] }}</td>

                        @if($order->Status==3|| $order->Status ==4)
                        <td>
                            <button class="btn btn-outline-primary" hidden><a></a></button>
                        </td>
                        @else
                            <td>
                                <button class="btn btn-outline-primary"><a
                                    href="{{ URL::to('/order_edit/'.$order->OrderID) }}">Update</a></button>
                            </td>
                        @endif
                            <td>
                                <button class="btn btn-outline-primary"><a
                                    href="{{ URL::to('/order_detail/'.$order->OrderID) }}">View Detail</a></button>
                            </td>
                        </tr>

                        
                       
                    @endforeach
                </tbody>
            </table>
            {{$orders->links()}}
        </div>
    </div>
</div>
@endsection
