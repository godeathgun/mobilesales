<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;
use App\Cart;
use Illuminate\Support\Facades\Redirect;
use App\Order;
use App\OrderDetail;
use Carbon;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('product')->take(8)->get();
        return view('client.index',['products'=>$products]);
    }

    public function productsclient()
    {

        $products = DB::table('product')->where('Status',1)->paginate(12);
        return view('client.category',['products'=>$products]);
    }

    //search 
    public function getSearch(Request $req)
    {
        
        $products = Product::where('ProductName','LIKE','%'.$req->key.'%')
        ->orWhere('Price','LIKE','%'.$req->key.'%')->paginate(12);
        return view('client.category', ['products' => $products]);
       
    }
    public function product_by_manufacturer($manuName)
    {
        $products= DB::table('product')
                    ->where('ManufacturerID',$manuName)
                    ->where('Status',1)
                    ->paginate(12);
        return view('client.category',['products'=>$products]);
    }
    
    // public function product_by_mn($req)
    // {
       
    //     $products= DB::table('product')
    //                 ->where('ManufacturerID',$req->product_manufacturerid)
    //                 ->where('Status',1)
    //                 ->paginate(12);
       
    //     return view('client.category',['products'=>$products]);
    // }
// product detail
    public function productdetail($ProductID)
        {
            // print('product id là'.$ProductID);
            $products = DB::table('product')->where('ProductID',$ProductID)->first();
            $relative = DB::table('product')->where('ManufacturerID',$products->ManufacturerID)->take(4)->get();
            
            return view('client.product',['products'=>$products],['relatives'=>$relative]);
        }
// relative product
}
