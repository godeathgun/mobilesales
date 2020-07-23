@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Customer index </h2>
            &nbsp;
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <div>
                <a href="customer_create" type="button" class="btn btn-primary">Create</a>
            </div>
            &nbsp;
            <form action="search_customer" method="get" enctype="multipart/form-data" class="form-horizontal" >
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
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                    @foreach($customers as $customer)
                        <tr>
                            <th scope="row">{{ $customer->CustomerID }}</th>
                            <td>{{ $customer->CustomerName }}</td> 
                            <td>{{ $customer->Phone }}</td>
                            <td>{{ $customer->Email }}</td>
                            <td>{{ $customer->Address }}</td>
                            @if($customer->Status == 1)
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
                                    href="{{ URL::to('/customer_edit/'.$customer->CustomerID) }}">Update</a></button>

                                <!-- Button trigger modal -->
                                    <a  onclick="return confirm('Are you sure?')" href="{{ URL::to('/delete_customer/'.$customer->CustomerID) }}">Delete</a>
                                </button>

                                @if($customer->Status == 1)
                                    <button class="btn btn-outline-warning"><a
                                            href="{{ URL::to('/unactivate_customer/'.$customer->CustomerID) }}">Unactivate</a></button>
                                @else
                                    <button class="btn btn-outline-success"><a
                                            href="{{ URL::to('/activate_customer/'.$customer->CustomerID) }}">activate</a></button>
                                @endif
                            </td>
                        </tr>
                        
                    @endforeach
                </tbody>
            </table>

            {{$customers->links()}}
        </div>
    </div>
</div>


@endsection
