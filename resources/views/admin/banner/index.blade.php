@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <a href="view_banner_create" type="button" class="btn btn-primary">Create</a>
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
                <?php $banners=DB::table('banner')->get(); ?>
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
                                <button class="btn btn-outline-primary"><a>Update</a></button>

                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal"> Delete
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Banner</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete this banner?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <a href="{{ URL::to('/delete_banner/'.$banner->BannerID) }}"
                                                    type="button" class="btn btn-primary">Confirm</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



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
        </div>
    </div>
</div>


@endsection
