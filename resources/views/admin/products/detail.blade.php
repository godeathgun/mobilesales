@extends('admin.layouts.app')

@section('content')
<div class="card-body card-block">



        <h2> Product Detail </h2>
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
           <p>{{$select_product->ProductName}}
        
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Price</label></div>
            <p>{{number_format($select_product->Price).' '.'VND'}}</p>
        </div>  

     

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Instock</label></div>
            
            <p>{{$select_product->InStock}}</p>
        </div>

        
        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">FrontCamera</label></div>
            
            <p>{{$select_product->FrontCamera}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Camera</label></div>
            <p>{{$select_product->Camera}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Screen</label></div>
            
            <p>{{$select_product->Screen}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ram</label></div>
            <p>{{$select_product->Ram}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">ROM</label></div>
            <p>{{$select_product->ROM}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">CPU</label></div>
            <p>{{$select_product->CPU}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">GPU</label></div>
            <p>{{$select_product->GPU}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Battery</label></div>
            <p>{{$select_product->Battery}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">OS</label></div>
            <p>{{$select_product->Battery}}</p>
        </div>

        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sim</label></div>
            <p>{{$select_product->Sim}}</p>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Manufacturer</label></div>
            <?php $manufacturers=DB::table('manufacturer')->get(); ?>
            <?php $currmanufacturer=DB::table('manufacturer')->where('ManufacturerID', $select_product->ManufacturerID)->first(); ?>
            <option value="{{$select_product->ManufacturerID}}">{{ $currmanufacturer->ManufacturerName}}</option>
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="select" class=" form-control-label">Category</label></div>
                <?php $categories=DB::table('category')->get(); ?>
                    <?php $currcategory=DB::table('category')->where('CategoryID', $select_product->CategoryID)->first(); ?>
                    <option value="{{$select_product->CategoryID}}">{{ $currcategory->CategoryName}}</option>
        </div>
      
        <div class="row form-group">
            <div class="col col-md-3">
                <a class="btn btn-primary" href="/products" >Back </a>
            </div>
        </div>

      
</div>    
@endsection
