@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Banner index </h2>
            &nbsp;
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <div>
                <a href="banner_create" type="button" class="btn btn-primary">Create</a>
            </div>
            &nbsp;
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Link</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                        <tr>
                            <th scope="row">{{ $banner->BannerID }}</th>
                            <td>{{ $banner->Link }}</td>
                            <td><img width="100" src="images/banner/{{ $banner->Image }}"></td>

                            @if($banner->Status == 1)
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
                                        href="{{ URL::to('/banner_edit/'.$banner->BannerID) }}">Update</a></button>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <a  onclick="return confirm('Are you sure?')"
                                        href="{{ URL::to('/delete_banner/'.$banner->BannerID) }}">Delete</a>
                                </button>

                                @if($banner->Status == 1)
                                    <button class="btn btn-outline-warning"><a
                                            href="{{ URL::to('/unactivate_banner/'.$banner->BannerID) }}">Unactivate</a></button>
                                @else
                                    <button class="btn btn-outline-success"><a
                                            href="{{ URL::to('/activate_banner/'.$banner->BannerID) }}">activate</a></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$banners->links()}}
        </div>
    </div>
</div>


@endsection
