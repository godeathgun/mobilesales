<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Mail;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

    //forgotpassword
    public function getForgotAdminpassword()
    {
        return view('admin.forgotpassword');
    }

    public function postForgotAdminpassword(Request $req)
    {
        if(DB::table('employee')->where('Email',$req->employee_email))
        {
            $to_name="Mobile Sale";
            $to_mail = $req ->employee_email;
            $data = array('code'=>rand(100000,999999));
            $forgotadminpassword = array('employee_email'=>$req->employee_email, 'code' => $data['code']);
            Session::put('forgotadminpassword',$forgotadminpassword);
            Mail::send('admin.sendcode',$data,function($message)use($to_name,$to_mail){
                $message->to($to_mail)->subject("Đổi mật khẩu Mobile Sale!");
                $message->from($to_mail,$to_name);
            });
        }
        return redirect::to('/resetadminpassword');
    }

    public function getResetAdminPassword()
    {
        return view('admin.resetpassword');
    }

    public function postResetAdminPassword(Request $req)
    {
        if(DB::table('employee')->where('Email',$req->Email))
        {
            if($req->code == Session::get('forgotadminpassword')['code'])
            {
                $this-> validate($req,[
                    'confirm_password'=>'same:new_password'
                ],[
                    'confirm_password.same'=>'Mật khẩu nhập lại chưa chính xác'
                ]);
                DB::table('employee')->where('Email', Session::get('forgotadminpassword')['employee_email'])
                ->update(['Password'=>md5(sha1(($req->new_password)))]);
                Session::forget('forgotadminpassword');
            }
        }
        return redirect('/adminlogin')->with('thongbao','Đặt lại mật khẩu thành công!');
    }

    //AdminLogin

    public function getAdminLogin()
    {
        return view('admin.adminlogin');
    }
    public function postAdminLogin(Request $request)
    {
        
        if(Employee::where('Email',"=", $request->email)->where("Password","=",md5(sha1($request->password)))->first())
        {
            $employeecheck = Employee::where('Email',"=", $request->email)->first();
            if(Session::has('adminLogin'))
            {
                Session::forget('adminLogin');
            }
            if(Session::has('employeeLogin'))
            {
                Session::forget('employeeLogin');
            }
            if( $employeecheck->Role == "Admin")
            {
                $admin = Employee::where('Email',"=", $request->email)->where("Role","=","Admin")->first();
                Session::put('adminLogin', $admin);
                return redirect('/admin');
            }
            if($employeecheck->Role == "Employee" &&  $employeecheck->Status == 1)
            {
                $employee = Employee::where('Email',"=", $request->email)->where("Role","=","Employee")->where("Status",1)->first();

                Session::put('employeeLogin', $employee);
                return redirect('/products');
            }
        }
        else 
        {
            return redirect('/adminlogin')->with('thongbao','Sai email hoặc password!');
        }
      
    }
    public function getLogout()
    {
        Session::forget('adminLogin');
        Session::forget('employeeLogin');
        return redirect('/adminlogin');
    }
}
