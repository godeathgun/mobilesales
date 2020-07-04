@extends('admin.layouts.app')

@section('content')
<div class="card-body card-block">


    <form action="create_product" method="post" enctype="multipart/form-data" class="form-horizontal">

        <h2> Product create </h2>
            &nbsp;

        <?php $error = Session::get('error');?>
            @if($error)
                <p class="alert alert-danger">
                    <?php echo $error;
                Session::put('error',null); ?>
                </p>
            @endif
        
        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">ProductName</label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="product_name" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price</label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="product_price" placeholder="Text" class="form-control" required>
            </div>
        </div>  

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Discount</label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="product_discount" placeholder="Text" class="form-control" required>
            </div>
        </div>  

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Instock</label></div>
            <div class="col-12 col-md-9">
                <input type="text" id="text-input" name="product_instock" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Select Manufacturer</label></div>
            <div class="col-12 col-md-9">
                <select name="manufactuerid" id="select" class="form-control">
                    
                    <option value="0">Please select</option>

                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Select Category</label></div>
            <div class="col-12 col-md-9">
                <select name="categoryid" id="select" class="form-control">
                    <?php $categories=DB::table('category')->get(); ?>
                    <option value="-1">Please select</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->CategoryID}}">{{$category->CategoryName}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
            <div class="col col-md-9">
                <div class="form-check">
                    <div class="checkbox">
                        <label for="checkbox1" class="form-check-label ">
                            <input type="checkbox" id="checkbox1" name="product_status" value="option1" class="form-check-input">Option 1
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image0</label></div>
            <div class="col-12 col-md-9"><input type="file" id="Image0" name="Image0" class="form-control-file"></div>
        </div> 

        <div class="row form-group">
            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image1</label></div>
            <div class="col-12 col-md-9"><input type="file" id="Image1" name="Image1" class="form-control-file"></div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image2</label></div>
            <div class="col-12 col-md-9"><input type="file" id="Image2" name="Image2" class="form-control-file"></div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Image3</label></div>
            <div class="col-12 col-md-9"><input type="file" id="Image3" name="Image3" class="form-control-file"></div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </div>
    </form>
</div>    
@endsection
