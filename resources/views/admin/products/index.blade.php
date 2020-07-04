@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Product index </h2>
            &nbsp;
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <div>
                <a href="product_create" type="button" class="btn btn-primary">Create</a>
            </div>
            &nbsp;
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">InStock</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php $products=DB::table('product')->get(); ?>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->ProductID }}</th>
                            <td>{{ $product->ProductName }}</td>
                            <td><img src="images/product/{{ $product->Image0 }}" width="50"></td>
                            <td>{{ $product->Price }}</td>
                            <td>{{ $product->InStock }}</td>

                            @if($product->Status == 1)
                                <td>
                                    <label class="badge badge-success">Activated</label>
                                </td>
                            @else
                                <td>
                                    <label class="badge badge-danger">Unactivated</label>
                                </td>
                            @endif

                            <td>
                                <button class="btn btn-outline-primary"><a
                                    href="{{ URL::to('/product_edit/'.$product->ProductID) }}">Update</a></button>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal"> 
                                    <a href="{{ URL::to('/delete_product/'.$product->ProductID) }}">Delete</a>
                                </button>

                                @if($product->Status == 1)
                                    <button class="btn btn-outline-warning"><a
                                            href="{{ URL::to('/unactivate_product/'.$product->ProductID) }}">Unactivate</a></button>
                                @else
                                    <button class="btn btn-outline-success"><a
                                            href="{{ URL::to('/activate_product/'.$product->ProductID) }}">activate</a></button>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
