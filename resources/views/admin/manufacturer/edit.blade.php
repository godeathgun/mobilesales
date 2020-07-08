@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <form action="{{ action('ManufacturerController@edit_manufacturer') }}" method="POST"
            enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Manufacturer Name</label>
                <input value="{{$select_manufacturer->ManufacturerName}}" id="cname" class="form-control" name="manufacturer_name" type="text" required>
                <input hidden value="{{$select_manufacturer->ManufacturerID}}" id="cname" class="form-control" name="manufacturer_id" type="text" required>
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
