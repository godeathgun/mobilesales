@extends('admin.layouts.app')

@section('content')
<div class="card-body card-block">


<form method="POST" action="{{ action('ProductController@edit_product') }}" enctype="multipart/form-data" class="form-horizontal">

        <h2> Product edit </h2>
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
                <input value="{{ $select_product->ProductName }}" type="text" id="text-input" name="product_name" placeholder="Text" class="form-control" required>
            
                <input hidden value="{{ $select_product->ProductID }}" type="text" id="text-input" name="product_id" placeholder="Text" class="form-control" required>
 
            </div>
        
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->Price }}" type="text" id="text-input" name="product_price" placeholder="Text" class="form-control" required>
            </div>
        </div>  

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Discount</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->Discount }}" type="text" id="text-input" name="product_discount" placeholder="Text" class="form-control" required>
            </div>
        </div>  

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Instock</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->InStock }}" type="text" id="text-input" name="product_instock" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">ModifiedDate</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->ModifiedDate }}" type="date" id="text-input" name="product_modifieddate" placeholder="Text" class="form-control" required>
            </div>
        </div>

        
        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">FrontCamera</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->FrontCamera }}"  type="text" id="text-input" name="product_frontcamera" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Camera</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->Camera }}" type="text" id="text-input" name="product_camera" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Screen</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->Screen }}" type="text" id="text-input" name="product_screen" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ram</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->Ram }}" type="text" id="text-input" name="product_ram" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">ROM</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->ROM }}" type="text" id="text-input" name="product_rom" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">CPU</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->CPU  }}" type="text" id="text-input" name="product_cpu" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">GPU</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->GPU }}" type="text" id="text-input" name="product_gpu" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Battery</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->Battery }}" type="text" id="text-input" name="product_battery" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">OS</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->OS }}" type="text" id="text-input" name="product_os" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sim</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->Sim }}" type="text" id="text-input" name="product_sim" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">YearReleased</label></div>
            <div class="col-12 col-md-9">
                <input value="{{ $select_product->YearReleased }}" type="text" id="text-input" name="product_yearreleased" placeholder="Text" class="form-control" required>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Select Manufacturer</label></div>
            <div class="col-12 col-md-9">
                <select name="product_manufacturerid" id="select" class="form-control">
                    <?php $manufacturers=DB::table('manufacturer')->get(); ?>
                    <?php $currmanufacturer=DB::table('manufacturer')->where('ManufacturerID', $select_product->ManufacturerID)->first(); ?>
                    <option value="{{$select_product->ManufacturerID}}">{{ $currmanufacturer->ManufacturerName}}</option>
                    @foreach ($manufacturers as $item)
                        <option value="{{$item->ManufacturerID}}">{{$item->ManufacturerName}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Select Category</label></div>
            <div class="col-12 col-md-9">
                <select name="categoryid" id="select" class="form-control">
                    <?php $categories=DB::table('category')->get(); ?>
                    <?php $currcategory=DB::table('category')->where('CategoryID', $select_product->CategoryID)->first(); ?>
                    <option value="{{$select_product->CategoryID}}">{{ $currcategory->CategoryName}}</option>
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
                            <input value="{{ $select_product->Status }}" type="checkbox" id="checkbox1" name="product_status" class="form-check-input">Active
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
