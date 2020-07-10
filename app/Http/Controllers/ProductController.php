<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use File;
use App\Product;


class ProductController extends Controller
{
    public function view_index()
    {
        $products = DB::table('product')->paginate(10);
        return view ('admin.products.index', ['products' => $products]);
    }

    public function view_create()
    {
        return view('admin.products.create');
    }

    public function search_product(Request $req)
    {
        $products = Product::where('ProductName','LIKE','%'.$req->input_data.'%')
        ->orWhere('ProductID','LIKE','%'.$req->input_data.'%')->paginate(100);
        return view('admin.products.index', ['products' => $products]);
    }

    public function create(Request $req)
    {
       if($req->product_categoryid==-1)
       {
            Session::put('error','Please select category');
            return redirect::to('/product_create');
       }
       else if($req->product_manufacturerid == -1){
            Session::put('error','Please select category');
            return redirect::to('/product_create');
       }
       else{
            $product=new Product;
            $product->ProductName=$req->product_name;
            $product->Price=$req->product_price;
            $product->Discount=$req->product_discount;
            $product->InStock=$req->product_instock;
            $product->CreatedDate=$req->product_createddate;
            $product->CategoryID=$req->product_categoryid;
            $product->ManufacturerID=$req->product_manufacturerid;
            $product->FrontCamera=$req->product_frontcamera;
            $product->Screen=$req->product_screen;
            $product->Camera=$req->product_camera;
            $product->Ram=$req->product_ram;
            $product->ROM=$req->product_rom;
            $product->CPU=$req->product_cpu;
            $product->GPU=$req->product_gpu;
            $product->Battery=$req->product_battery;
            $product->OS=$req->product_os;
            $product->Sim=$req->product_sim;
            $product->YearReleased=$req->product_yearreleased;
            
            if($req->product_status==1)
                $product->Status=1;
            else
                $product->Status=0;

            if($req->hasFile('Image0'))
            {
                $file = $req->file('Image0');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('images/product',$filename);
                $product->Image0 = $filename;
            }
            else{
                $product->Image0 = NULL;
            }

            if($req->hasFile('Image1'))
            {
                $file = $req->file('Image1');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('images/product',$filename);
                $product->Image1 = $filename;
            }
            else{
                $product->Image1 = NULL;
            }

            if($req->hasFile('Image2'))
            {
                $file = $req->file('Image2');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('images/product',$filename);
                $product->Image2 = $filename;
            }
            else{
                $product->Image2 = NULL;
            }

            if($req->hasFile('Image3'))
            {
                $file = $req->file('Image3');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' .$extension;
                $file->move('images/product',$filename);
                $product->Image3 = $filename;
            }
            else{
                $product->Image3 = NULL;
            }
        }

        $product->save();
        Session::put('message','The product is added successfully');
        return redirect::to('/products');
    }

    public function unactivate_product($id)
    {
        Product::where('ProductID',$id)->update(['Status'=>0]);
        return redirect::to('/products');
    }

    public function activate_product($id)
    {
        Product::where('ProductID',$id)->update(['Status'=>1]);
        return redirect::to('/products');
    }

    public function delete_product($id)
    {
        $select_product=Product::where('ProductID',$id)->first();

        if($select_product->Image0!=NULL)
        {
            File::delete('images/product/'.$select_product->Image0);
        }
        if($select_product->Image1!=NULL)
        {
            File::delete('images/product/'.$select_product->Image1);
        }
        if($select_product->Image2!=NULL)
        {
            File::delete('images/product/'.$select_product->Image2);
        }
        if($select_product->Image3!=NULL)
        {
            File::delete('images/product/'.$select_product->Image3);
        }

        Product::where('ProductID',$id)->delete();

        Session::put('message','The product is deleted successfully');

        return redirect::to('/products');
    }

    public function view_edit($id)
    {
        $select_product=Product::where('ProductID',$id)->first();

        $manage_product = view('admin.products.edit')->with('select_product',$select_product);

        return view('admin.layouts.app')->with('admin.products.edit',$manage_product);
    }
    public function  product_detail($id)
    {   
        $select_product=Product::where('ProductID',$id)->first();

        $manage_product = view('admin.products.detail')->with('select_product',$select_product);

        return view('admin.layouts.app')->with('admin.products.detail',$manage_product);
    }
    public function edit_product(Request $req)
    {

        $select_product = DB::table('product')->where('ProductID', $req->product_id)
            ->first();
            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['ProductName'=>$req->product_name]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['Price'=>$req->product_price]);
            
            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['Discount'=>$req->product_discount]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['InStock'=>$req->product_instock]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['ModifiedDate'=>$req->product_modifieddate]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['CategoryID'=>$req->categoryid]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['ManufacturerID'=>$req->product_manufacturerid]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['FrontCamera'=>$req->product_frontcamera]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['Camera'=>$req->product_camera]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['Ram'=>$req->product_ram]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['ROM'=>$req->product_rom]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['CPU'=>$req->product_cpu]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['GPU'=>$req->product_gpu]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['Battery'=>$req->product_battery]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['OS'=>$req->product_os]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['Sim'=>$req->product_sim]);

            DB::table('product')->where('ProductID', $req->product_id)
            ->update(['YearReleased'=>$req->product_yearreleased]);


            if($req->product_status==1)
                DB::table('product')->where('ProductID', $req->product_id)
                    ->update(['Status'=>1]);
            else
            DB::table('product')->where('ProductID', $req->product_id)
                     ->update(['Status'=>0]);
            


            if($req->hasFile('Image0'))
            {
                if($select_product->Image0!=NULL)
                {
                    File::delete('images/product/'.$select_product->Image0);
                }
                $file = $req->file('Image0');
                $extension = $file->getClientOriginalExtension();
                $filename = $select_product->ProductName . '0'.'.' .$extension;
                $file->move('images/product',$filename);
                DB::table('product')->where('ProductID', $req->product_id)
                    ->update(['Image0'=>$filename]);
            }

            if($req->hasFile('Image1'))
            {
                if($select_product->Image1!=NULL)
                {
                    File::delete('images/product/'.$select_product->Image1);
                }
                $file = $req->file('Image1');
                $extension = $file->getClientOriginalExtension();
                $filename = $select_product->ProductName . '-1'.'.' .$extension;
                $file->move('images/product',$filename);
                DB::table('product')->where('ProductID', $req->product_id)
                    ->update(['Image1'=>$filename]);
            }

            if($req->hasFile('Image2'))
            {
                if($select_product->Image2!=NULL)
                {
                    File::delete('images/product/'.$select_product->Image2);
                }
                $file = $req->file('Image2');
                $extension = $file->getClientOriginalExtension();
                $filename = $select_product->ProductName . '-2'.'.' .$extension;
                $file->move('images/product',$filename);
                DB::table('product')->where('ProductID', $req->product_id)
                    ->update(['Image2'=>$filename]);
            }

            if($req->hasFile('Image3'))
            {
                if($select_product->Image3!=NULL)
                {
                    File::delete('images/product/'.$select_product->Image3);
                }
                $file = $req->file('Image3');
                $extension = $file->getClientOriginalExtension();
                $filename = $select_product->ProductName . '-3'.'.' .$extension;
                $file->move('images/product',$filename);
                DB::table('product')->where('ProductID', $req->product_id)
                    ->update(['Image3'=>$filename]);
            }


        Session::put('message','The product is updated successfully');
        return redirect::to('/products');
    }


}
