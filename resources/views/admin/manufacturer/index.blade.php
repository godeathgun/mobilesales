@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Manufacturer index </h2>
            &nbsp;
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <div>
                <a href="manufacturer_create" type="button" class="btn btn-primary">Create</a>
            </div>
            &nbsp;
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
               
                <tbody>
                    @foreach($manufacturers as $manufacturer)
                        <tr>
                            <th scope="row">{{ $manufacturer->ManufacturerID }}</th>
                            <td>{{ $manufacturer->ManufacturerName }}</td>

                            @if($manufacturer->Status == 1)
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
                                        href="{{ URL::to('/manufacturer_edit/'.$manufacturer->ManufacturerID) }}">Update</a></button>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <a
                                        href="{{ URL::to('/delete_manufacturer/'.$manufacturer->ManufacturerID) }}">Delete</a>
                                </button>

                                @if($manufacturer->Status == 1)
                                    <button class="btn btn-outline-warning"><a
                                            href="{{ URL::to('/unactivate_manufacturer/'.$manufacturer->ManufacturerID) }}">Unactivate</a></button>
                                @else
                                    <button class="btn btn-outline-success"><a
                                            href="{{ URL::to('/activate_manufacturer/'.$manufacturer->ManufacturerID) }}">activate</a></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$manufacturers->links()}}
        </div>
    </div>
</div>
@endsection
