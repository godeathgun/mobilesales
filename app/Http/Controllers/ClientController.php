<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Mail;
use Illuminate\Support\Facades\Auth;
use DB;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function cart()
    {
        return view('client.cart');
    }

    public function category()
    {
        return view('client.category');
    }

    public function checkout()
    {
        return view('client.checkout');
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function getRegister()
    {
        return view('client.register');
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
        $user->Password = bcrypt($request->password);
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
        dd($arr);
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
        Auth::logout();
        return redirect('/login');
    }
    
    
}
