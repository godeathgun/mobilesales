<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
