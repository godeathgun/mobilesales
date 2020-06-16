<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
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
            return redirect::to('/view_product_create');
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
        return redirect::to('/view_product_index');
    }

    public function unactivate_product($id)
    {
        Product::where('ProductID',$id)->update(['Status'=>0]);
        return redirect::to('/view_product_index');
    }

    public function activate_product($id)
    {
        Product::where('ProductID',$id)->update(['Status'=>1]);
        return redirect::to('/view_product_index');
    }

    public function delete_product($id)
    {
        $select_image=Product::where('ProductID',$id)->first();

        if($select_image->Image1!=NULL)
        {
            File::delete('public/images/product/'.$select_image->Image1);
        }

        Product::where('ProductID',$id)->delete();

        Session::put('message','The product is deleted successfully');

        return redirect::to('/view_product_index');
    }
}
