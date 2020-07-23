@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Category index </h2>
            &nbsp;
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <div>
                <a href="category_create" type="button" class="btn btn-primary">Create</a>
            </div>
            &nbsp;
            <form action="search_category" method="get" enctype="multipart/form-data" class="form-horizontal" >
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
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->CategoryID }}</th>
                            <td>{{ $category->CategoryName }}</td>

                            @if($category->Status == 1)
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
                                        href="{{ URL::to('/category_edit/'.$category->CategoryID) }}">Update</a></button>

                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <a
                                        href="{{ URL::to('/delete_category/'.$category->CategoryID) }}">Delete</a>
                                </button> --}}

                                @if($category->Status == 1)
                                    <button class="btn btn-outline-warning"><a
                                            href="{{ URL::to('/unactivate_category/'.$category->CategoryID) }}">Unactivate</a></button>
                                @else
                                    <button class="btn btn-outline-success"><a
                                            href="{{ URL::to('/activate_category/'.$category->CategoryID) }}">activate</a></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
        </div>
    </div>
</div>
@endsection
