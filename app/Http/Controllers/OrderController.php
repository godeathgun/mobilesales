<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Order;
use App\OrderDetail;
use Carbon;

class OrderController extends Controller
{
    public function view_index()
    {
        $orders = DB::table('order')->orderBy('OrderDate', 'DeSC')->paginate(10);
        return view ('admin.order.index',['orders'=>$orders]);
    }

    public function view_edit($id)
    {
        $order = DB::table('order')->where('OrderID',$id)->first();
        return view ('admin.order.edit',['order'=>$order]);
    }
    public function edit_order(Request $req)
    {

        $this_order = DB::table('order')->where('OrderID', $req->id)->first();

        DB::table('order')->where('OrderID', $req->id)
            ->update(['Status'=>$req->order_status]);
        if(Session::has('employeeLogin'))
        {
            DB::table('order')->where('OrderID', $req->id)
                ->update(['EmployeeID'=>Session::get('employeeLogin')->EmployeeID]);
        }
        else
       {
            DB::table('order')->where('OrderID', $req->id)
            ->update(['EmployeeID'=>Session::get('adminLogin')->EmployeeID]);
       }
            
        Session::put('message','The order is updated successfully');
        if($req->order_status ==1)
        {
            $to_name="Moblie Sale";
            $to_mail = DB::table('customer')->where('CustomerID',$this_order->CustomerID)->first()->Email;
            $url = route('user.verify.order');
            $data =['route'=>$url];
            
    
            Mail::send('admin.verify_order',$data,function($message)use($to_name,$to_mail){
                $message->to($to_mail)-> subject('Xác nhận đơn hàng!!!');
                $message->from($to_mail,$to_name);});
        }
        if($req->order_status ==4)
        {
            $to_name="Moblie Sale";
            $to_mail = DB::table('customer')->where('CustomerID',$this_order->CustomerID)->first()->Email;
            $url = route('user.verify.order');
            $data =['route'=>$url];
            
    
            Mail::send('admin.verify_order',$data,function($message)use($to_name,$to_mail){
                $message->to($to_mail)-> subject('Đơn hàng bị hủy!!!');
                $message->from($to_mail,$to_name);});
        }
        return redirect::to('/orders');
    }

    public function order_detail($id)
    {
        $order = DB::table('order')->where('OrderID',$id)->first();
        $orderdetails = DB::table('orderdetail')->where('OrderID', $id)->get();
        return view('admin.order.detail',['order'=>$order],['orderdetails'=>$orderdetails]);
    }

}
