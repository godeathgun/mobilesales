<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use App\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }
    public function productdetail($ProductID)
    {
        // print('product id là'.$ProductID);
        $products = DB::table('product')->where('ProductID',$ProductID)->first();
        return view('client.product',['products'=>$products]);
    }
    public function register()
    {
        return view('client.register');
    }

    public function cart()
    {
        return view('client.cart');
    }

    public function category()
    {
        $products = DB::table('product')->paginate(12);
        return view('client.category',['products'=>$products]);
    }

    public function checkout()
    {
        return view('client.checkout');
    }

    public function contact()
    {
        
        return view('client.contact');
    }

    function getSearch(Request $req)
    {
        
        $products = Product::where('ProductName','LIKE','%'.$req->key.'%')
        ->orWhere('Price','LIKE','%'.$req->key.'%')->paginate(12);
        return view('client.category', ['products' => $products]);
       
    }
    public function product_by_manufacturer($manuName)
    {
        //  print('asdas '.$manuName);
        # code...

        $products= DB::table('product')
                    ->where('ManufacturerID',$manuName)
                    // ->where('status',1)
                    ->paginate(12);
        // $manu_product =view('client.category')
        //         ->with('products',$products);
        return view('client.category',['products'=>$products]);
    }
    public function getIndex()
    {
        $products = DB::table('product')->where('ProductID',$ProductID)->first();
        return view('client.product',['products'=>$products]);
    }
    public function getAddToCart(Request $req,$id)
    {
        $product = Product::find($id);
        $oldCart=Session::has('cart')? Session::get('cart') :null;
        $cart=new Cart($oldCart);
        $cart->add($product,$ProductID->ID);
        $req->session()->put('cart', $cart);
        dd($req->session()->get('cart'));
        return redirect()->route('product.index');
    }
}
