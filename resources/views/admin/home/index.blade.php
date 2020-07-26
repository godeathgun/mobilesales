@extends('admin.layouts.app')

@section('content')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">{{number_format($revenue).' '.'VND'}}</div>
                                    <div class="stat-heading">Doanh thu (Revenue)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-cart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$number_of_orders}}</span></div>
                                    <div class="stat-heading">(Đơn hàng)Number of orders</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-browser"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$product_sales_count}}</span></div>
                                    <div class="stat-heading">(Số lượng sản phẩm bán được) Product count</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{$number_of_customers}}</span></div>
                                    <div class="stat-heading">Khách hàng(Clients)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
            <div><h3>Đơn hàng mới</h3></div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">OrderID</th>
                    <th scope="col">OrderDate</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>

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
                        <button class="btn btn-outline-success"><a
                            href="{{ URL::to('/order_detail/'.$order->OrderID) }}">View Detail</a></button>
                        <button class="btn btn-outline-primary" hidden><a></a></button>
                    </td>
                    @else
                        <td>
                            <button class="btn btn-outline-success"><a
                                href="{{ URL::to('/order_detail/'.$order->OrderID) }}">View Detail</a></button>
                            <button class="btn btn-outline-primary"><a
                                href="{{ URL::to('/order_edit/'.$order->OrderID) }}">Update</a></button>
                            
                        @endif
                        
                        </td>
                    </tr>

                    
                   
                @endforeach
            </tbody>
        </table>
        {{$orders->links()}}

    </div>
    <!-- .animated -->
</div>    

@endsection
