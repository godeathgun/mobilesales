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
        $orders = DB::table('order')->paginate(10);
        return view ('admin.order.index',['orders'=>$orders]);
    }

    public function view_edit($id)
    {
        $order = DB::table('order')->where('OrderID',$id)->first();
        return view ('admin.order.edit',['order'=>$order]);
    }
    public function edit_order(Request $req)
    {

        DB::table('order')->where('OrderID', $req->id)
            ->update(['Status'=>$req->order_status]);
            
        Session::put('message','The order is updated successfully');
        return redirect::to('/orders');
    }

    public function order_detail($id)
    {
        $order = DB::table('order')->where('OrderID',$id)->first();
        $orderdetails = DB::table('orderdetail')->where('OrderID', $id)->get();
        return view('admin.order.detail',['order'=>$order],['orderdetails'=>$orderdetails]);
    }

}
