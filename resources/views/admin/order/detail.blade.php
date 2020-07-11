@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Order index </h2>
            &nbsp;
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ShipName</label></div>
                <p>{{ $order->ShipName }}
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ShipMobile</label></div>
                <p>{{ $order->ShipMobile }}
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">ShipAddress</label></div>
                <p>{{ $order->ShipAddress }}
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">OrderItem</th>
                        <th scope="col">ProductName</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <?php $TotalPrice = 0 ?>
                <tbody>
                    @foreach($orderdetails as $item)
                        <tr>
                            <th scope="row">{{ $item->OrderItem }}</th>
                            <td>{{ DB::table('product')->where('ProductID',$item->ProductID)->first()->ProductName }}x{{ $item->Quantity }}
                            </td>
                            <td>{{number_format($item->Price).' '.'VND'}}</td>
                            <?php $TotalPrice += $item->Price ?>
                        </tr>
                    @endforeach
                </tbody>
                <tbody>
                    <tr>
                      <th scope="row">Subtotal</th>
                      <td></td>
                      <td>{{ number_format($TotalPrice).' '.'VND' }}</td>
                      {{-- {{number_format($item->Price).' '.'VND'}} --}}
                    </tr>
                    <tr>
                        <th scope="row">Ship Fee</th>
                        <td></td>
                        <td>0</td>
                    </tr>
                    <tr> 
                        <th scope="row">Total</th>
                        <td></td>
                        <td>{{ number_format($TotalPrice).' '.'VND' }}</td>
                    </tr>
                  </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection
