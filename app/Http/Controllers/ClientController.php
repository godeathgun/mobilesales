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

class ClientController extends Controller
{
    public function index()
    {
        $products = DB::table('product')->take(6)->get();
        return view('client.index',['products'=>$products]);
    }


    public function addToCart($id)
    {
        $product = DB::table('product')->where('ProductID',$id)->first();

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        Session::put('cart', $cart);
        
        // dd(Session::get('cart'));
        return redirect::to('/category');
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

    public function category()
    {

        $products = DB::table('product')->paginate(12);
        return view('client.category',['products'=>$products]);
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
        }
        return redirect('/');
    }

    public function contact()
    {
        return view('client.contact');
    }


    public function postRegister(Request $request)
    {
        $this-> validate($request,[
            'name'=>'min:2',
            'email'=>'email|unique:Customer,email',
            'address'=>'min:6',
            'phone'=>'min:9|max:10',
            'password'=>'min:3|max:32',
            'passwordAgain'=>'same:password'
        ],[
            'name.min'=>'Tên phải có ít nhất 2 kí tự',
            'email.email'=>'Bạn chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'address.min'=>'Địa chỉa phải có ít nhất 6 kí tự',
            'phone.min'=>'Số điện thoại phải có ít nhất 9 số',
            'phone.max'=>'Số điện thoại có tối đa 10 số',
            'password.min'=>'password phải có ít nhất 3 kí tự',
            'password.max'=>'password quá dài',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa chính xác'
        ]);
        $user = new Customer();
        $user->CustomerName = $request ->name;
        $user->Email = $request ->email;
        $user->Phone = $request ->phone;
        $user->Address = $request->address;
        $user->Password = Hash::make($request->password);
        $user->Status= 0;
        $user->Code= md5(sha1($request->email));
        $user->save();
        if($user->id)
        {
            $to_name="Moblie Sale";
        $to_mail = $request ->email;
        $url = route('user.verify.account',['CustomerID'=> $user ->id,"code"=> $user->Code]);
            
        $data =['route'=>$url];
            //$data = array("name"=>"Test", "body"=>"Mail xác nhận tài khoản!");

        Mail::send('client.verify_acount',$data,function($message)use($to_name,$to_mail){
            $message->to($to_mail,'Xac nhan tai khoan');
            $message->from($to_mail,$to_name);
        });
        return redirect('.')->with('thongbao','Chúc mừng bạn đã đăng kí thành công!');
        }  
        
        return redirect('/login');
        
    }

    public function verifyAccount(Request $request)
    {
        $code = $request->code;
        $ID = ($request ->CustomerID);
        $checkUser = DB::table('customer')->where('CustomerID',$ID)->where('Code',$code)->update(['Status'=>1]);

        
        if(!$checkUser)
        {
            return redirect('/register')-> with('danger','Xin lỗi đường dẫn không tồn tại! Vui lòng thử lại sau!');
        }

        return redirect('/')-> with('success!','Xác nhận tài khoản thành công');
    }

    public function getLogin()
    {
        return view('client.login');
    }
    public function postLogin(Request $request)
    {
        $arr=[
            'Email'=> $request->email,
            'password'=> $request->password
        ];

        $customer = Customer::where('Email',"=", $request->email)->where("Status","=",1)->first();

        Session::has('userLogin')? Session::get('userLogin'):null;

        Session::put('userLogin', $customer);
        //if(Customer::where('Email',"=", $request->email)->where("Password","=",md5(sha1($request->password)))->where("Status","=",1)->count()>0)
        if(Auth::attempt($arr))
        {
            if(Customer::where('Status',"=",1)->first())
            {

                return redirect('.')->with('thongbao','Đăng nhập thành công');
            }
            else
            {
                return redirect('/login')->with('thongbao','Tài khoản của bạn chưa được xác nhận! Vui lòng kiểm tra email!');
            }
        }
        else 
        {
            return redirect('/login')->with('thongbao','Sai email hoặc password!');
        }
      
    }
    public function getLogout()
    {
        Session::forget('userLogin');
        Auth::logout();
        return redirect('/login');
    }
    
    //register
    public function getregister()
    {
        return view('client.register');
    }

    //userInfo get
    public function infoCustomer()
    {
        $customer = DB::table('customer')->where('CustomerID',Session::get('userLogin')->CustomerID)->first();
        return view('client.cusInfo',['customer'=>$customer]);
    }
    public function getChangePassword()
    {
        $customer = DB::table('customer')->where('CustomerID',Session::get('userLogin')->CustomerID)->first();
        return view('client.changepassword',['customer'=>$customer]);
    }

    public function changePassword(Request $request)
    {
        $this-> validate($request,[
            'confirm_password'=>'same:new_password'
        ],[
            'confirm_password.same'=>'Mật khẩu nhập lại chưa chính xác'
        ]);

        if(Hash::check($request->old_password,Session::get('userLogin')->password))
        {
            DB::table('customer')->where('CustomerID', Session::get('userLogin')->CustomerID)
            ->update(['Password'=>Hash::make($request->new_password)]);

            Session::put('message','The change password successfully');
            return redirect('/changePassword');
        }
    }

    //Xem user order
    public function getOrder()
    {
        $orders = DB::table('order')->paginate(10);
        return view('client.userorder',['orders'=>$orders]);
    }

    public function userorder_detail($id)
    {
        $order = DB::table('order')->where('OrderID',$id)->first();
        $orderdetails = DB::table('orderdetail')->where('OrderID', $id)->get();
        return view('client.userorderdetail',['order'=>$order],['orderdetails'=>$orderdetails]);
    }

    public function orderuser_cancel($id)
    {
        DB::table('order')->where('OrderID',$id)->update(['Status'=>4]);
        Session::put('message','The order is canceled successfully');
        return redirect('/userorder');
    }

    public function search_order(Request $req)
    {
        $customers = Customer::where('CustomerName','LIKE','%'.$req->input_data.'%')
        ->orWhere('CustomerID','LIKE','%'.$req->input_data.'%')->paginate(10);
        return view('admin.customer.index', ['customers' => $customers]);
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
                    ->paginate(12);
        return view('client.category',['products'=>$products]);
    }
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
