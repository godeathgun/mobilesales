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

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = DB::table('product')->where('ProductID',$id)->first();

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        Session::put('cart', $cart);
        
        //dd(Session::get('cart'));
        //return redirect::to('cartaj');
        return view('client.cartaj',compact('cart'));
    }
    public function addCart($id)
    {
        $product = DB::table('product')->where('ProductID',$id)->first();

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        Session::put('cart', $cart);
        
        //dd(Session::get('cart'));
        return redirect::to('/productsclient');
       
    }

    public function cart(){

        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
    }

    public function updateCart(Request $req){
    //    print('id: '.$req->product_id . 'qty: '.$req->product_quantity);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateCart($req->product_id, $req->product_quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect::to('/cart');
    }

    public function removeItem($product_id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($product_id);
       
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }

        //dd(Session::get('cart'));
        return redirect::to('/cart');
    }

    public function checkout()
    {
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        
        return view('client.checkout', ['totalPrice' => $cart->totalPrice],['products' => $cart->items]);
        
    }

    public function addOrder(Request $req)
    {
        if(!Session::has('cart')){
            return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);


        $userLogin = Session::get('userLogin');

        $order = new Order();
        $order->CustomerID = Session::get('userLogin')->CustomerID;

        if($req->EmployeeID)
        {
            $order->EmployeeID=$req->EmployeeID;
        }
        else
            $order->EmployeeID=NULL;

        $order->OrderDate = Carbon\Carbon::now();
        $order->ShipAddress = $req->customer_address;
        $order->ShipName = $req->customer_name;
        $order->ShipMobile = $req->customer_phone;
        $order->ShipEmail = $req->customer_email;
        $order->Note=$req->customer_note;


        $order->Status = 0;

        $order->save();

        $carts = $cart->items;
        $count=1;
        foreach($carts as $item)
        {

            $orderdetail = new OrderDetail();
            $orderdetail->OrderItem= $count++;
            $orderdetail->OrderID = $order->id;
            $orderdetail->ProductID = $item['product_id'];
            $orderdetail->Price = $item['product_price'];
            $orderdetail->Quantity = $item['qty'];
            $orderdetail->Discount = $item['item']->Discount;
            $orderdetail->save();

            $this_product = DB::table('product')->where('ProductID', $item['product_id'])->first();
            DB::table('product')->where('ProductID', $item['product_id'])
            ->update(['InStock'=>(($this_product->InStock)-$item['qty'])]);
        }
        Session::forget('cart');

        return redirect('/');
    }

    public function contact()
    {
        return view('client.contact');
    }


  
}
