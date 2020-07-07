<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

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
        $user = new Customer;
        $user->CustomerName = $request ->name;
        $user->Email = $request ->email;
        $user->Phone = $request ->phone;
        $user->Address = $request->address;
        $user->Password = bcrypt($request->password);
        $user->Status= 0;
        $user->Code= 0;
        $user->save();
        return redirect('.')->with('thongbao','Chúc mừng bạn đã đăng kí thành công!');
    }

}
