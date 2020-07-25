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
                $message->to($to_mail)->subject("Xác nhận tài khoản Mobile Sale!");
                $message->from($to_mail,$to_name);
        });
            return redirect('/login');
        }  
        
        return redirect('/register')->with('thongbao','Đăng ký thất bại');
        
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

        
        //if(Customer::where('Email',"=", $request->email)->where("Password","=",md5(sha1($request->password)))->where("Status","=",1)->count()>0)
        if(Auth::attempt($arr))
        {
            if(Customer::where('Status',"=",1)->first())
            {
                $customer = Customer::where('Email',"=", $request->email)->where("Status","=",1)->first();

                Session::has('userLogin')? Session::get('userLogin'):null;

                 Session::put('userLogin', $customer);

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

    //forgotpassword
    public function getForgotpassword()
    {
        return view('client.forgotpassword');
    }

    public function postForgotpassword(Request $req)
    {
        if(DB::table('customer')->where('Email',$req->customer_email))
        {
            $to_name="Mobile Sale";
            $to_mail = $req ->customer_email;
            $data = array('code'=>rand(100000,999999));
            $forgotpassword = array('customer_email'=>$req->customer_email, 'code' => $data['code']);
            Session::put('forgotpassword',$forgotpassword);
            Mail::send('client.sendcode',$data,function($message)use($to_name,$to_mail){
                $message->to($to_mail)->subject("Đổi mật khẩu tài khoản Mobile Sale!");
                $message->from($to_mail,$to_name);
            });
        }
        return redirect::to('/resetpassword');
    }

    public function getResetPassword()
    {
        return view('client.resetpassword');
    }

    public function postResetPassword(Request $req)
    {
        if(DB::table('customer')->where('Email',$req->Email))
        {
            if($req->code == Session::get('forgotpassword')['code'])
            {
                $this-> validate($req,[
                    'confirm_password'=>'same:new_password'
                ],[
                    'confirm_password.same'=>'Mật khẩu nhập lại chưa chính xác'
                ]);
                DB::table('customer')->where('Email', Session::get('forgotpassword')['customer_email'])
                ->update(['Password'=>Hash::make($req->new_password)]);
                Session::forget('forgotpassword');
            }
        }
        return redirect('/login');
    }
    //userInfo get
    public function getinfoCustomer()
    {
        $customer = DB::table('customer')->where('CustomerID',Session::get('userLogin')->CustomerID)->first();
        return view('client.cusInfo',['customer'=>$customer]);
    }
    public function infoCustomer(Request $req)
    {
        $customer = DB::table('customer')->where('CustomerID',Session::get('userLogin')->CustomerID)->first();
        DB::table('customer')->where('customerID', Session::get('userLogin')->CustomerID)
            ->update(['CustomerName'=>$req->customer_name]);
        DB::table('customer')->where('customerID', Session::get('userLogin')->CustomerID)
            ->update(['Password'=>$req->customer_email]);
        DB::table('customer')->where('customerID', Session::get('userLogin')->CustomerID)
            ->update(['Address'=>$req->customer_address]);
        DB::table('customer')->where('customerID', Session::get('userLogin')->CustomerID)
            ->update(['Phone'=>$req->customer_phone]);
        Session::put('message','Cập nhật thông tin thành công');
        return redirect('/cusInfo');
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

            Session::put('message','Đổi mật khẩu thành công');
            return redirect('/changePassword');
        }
        else
        {
            Session::put('message','Nhập sai mật khẩu cũ');
            return redirect('/changePassword');
        }
    }

    //Xem user order
    public function getOrder()
    {
        $orders = DB::table('order')->where("CustomerID",Session::get('userLogin')->CustomerID)->paginate(10);
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
        $orderdetails = DB::table('orderdetail')->where('OrderID',$id)->get();
        foreach($orderdetails as $item)
        {
            $this_product = DB::table('product')->where('ProductID', $item->ProductID)->first();
            DB::table('product')->where('ProductID', $item->ProductID)
            ->update(['InStock'=>(($this_product->InStock)+$item->Quantity)]);
        }
        Session::put('message','The order is canceled successfully');
        return redirect('/userorder');
    }

    public function search_order(Request $req)
    {
        $customers = Customer::where('CustomerName','LIKE','%'.$req->input_data.'%')
        ->orWhere('CustomerID','LIKE','%'.$req->input_data.'%')->paginate(10);
        return view('admin.customer.index', ['customers' => $customers]);
    }
    
    public function contact()
    {
        
        return view('client.contact');
    }
  

}
