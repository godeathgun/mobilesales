<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

    public function product()
    {
        return view('admin.products.edit');
    }

    public function create_category()
    {
        return view('admin.category.create');
    }

    //AdminLogin

    public function getAdminLogin()
    {
        return view('admin.adminlogin');
    }
    public function postAdminLogin(Request $request)
    {
        $arr=[
            'Email'=> $request->email,
            'Password'=> $request->password
        ];

        $employee = employee::where('Email',"=", $request->email)->where("Status","=",1)->first();

        Session::has('adminLogin')? Session::get('adminLogin'):null;

        Session::put('adminLogin', $employee);
        //if(Customer::where('Email',"=", $request->email)->where("Password","=",md5(sha1($request->password)))->where("Status","=",1)->count()>0)
        if(Auth::attempt($arr))
        {
            if(employee::where('Status',"=",1)->first())
            {
                return redirect('/adminlogin')->with('thongbao','Đăng nhập thành công');
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
}
