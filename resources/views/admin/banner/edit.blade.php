@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <h2> Banner edit </h2>
            &nbsp;

        <?php $error = Session::get('error');?>
            @if($error)
                <p class="alert alert-danger">
                    <?php echo $error;
                Session::put('error',null); ?>
                </p>
            @endif

        <form action="{{ action('BannerController@edit_banner') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Link</label>
                <input id="cname" value="{{ $select_banner->Link }}" class="form-control" name="banner_link" type="text" required>
                <input hidden value="{{ $select_banner->BannerID }}" type="text" id="text-input" name="banner_id" placeholder="Text" class="form-control" required>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image</label></div>
                <div class="col-12 col-md-9"><input type="file" id="Image" name="Image" class="form-control-file"></div>
            </div> 

            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="checkbox">
                            <label for="checkbox1" class="form-check-label ">
                                <input type="checkbox" id="checkbox1" name="banner_status" value="1"
                                    class="form-check-input">True
                            </label>
                        </div>
                    </div>
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
