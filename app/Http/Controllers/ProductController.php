<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use File;
use App\Product;

class ProductController extends Controller
{
    public function view_index()
    {
        return view ('admin.products.index');
    }

    public function view_create()
    {
        return view('admin.products.create');
    }

    public function create(Request $req)
    {
       if($req->categoryid==-1)
       {
            Session::put('error','Please select category');
            return redirect::to('/products');
       }
       else{
            $product=new Product;
            $product->ProductName=$req->product_name;
            $product->Price=$req->product_price;
            $product->Discount=$req->product_discount;
            $product->InStock=$req->product_instock;
            $product->CategoryID=$req->categoryid;
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

        if($select_image->Image0!=NULL)
        {
            File::delete('images/product/'.$select_product->Image0);
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
                $filename = time() . '.' .$extension;
                $file->move('images/product',$filename);
                DB::table('product')->where('ProductID', $req->product_id)
                    ->update(['Image0'=>$filename]);
            }


        Session::put('message','The product is updated successfully');
        return redirect::to('/products');
    }

}
