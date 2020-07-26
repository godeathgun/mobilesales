<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use File;
use App\Customer;

class CustomerController extends Controller
{
    public function view_index()
    {
        $customers=DB::table('customer')->paginate(10);
        return view ('admin.customer.index',['customers'=>$customers]);
    }

    public function view_create()
    {
        return view('admin.customer.create');
    }


    public function search_customer(Request $req)
    {
        $customers = Customer::where('CustomerName','LIKE','%'.$req->input_data.'%')
        ->orWhere('CustomerID','LIKE','%'.$req->input_data.'%')->paginate(10);
        return view('admin.customer.index', ['customers' => $customers]);
    }
    
    public function create(Request $req)
    {
            $customer=new Customer;
            $customer->CustomerName=$req->customer_name;
            $customer->Password=$req->customer_password;
            $customer->Email=$req->customer_email;
            $customer->Address=$req->customer_address;
            $customer->Phone=$req->customer_phone;
            if($req->customer_status==1)
                $customer->Status=1;
            else
                $customer->Status=0;

        $customer->save();
        Session::put('message','The customer is added successfully');
        return redirect::to('/customers');
    }

    public function unactivate_customer($id)
    {
        customer::where('customerID',$id)->update(['Status'=>0]);
        return redirect::to('/customers');
    }

    public function activate_customer($id)
    {
        customer::where('customerID',$id)->update(['Status'=>1]);
        return redirect::to('/customers');
    }

    // public function delete_customer($id)
    // {
    //     $select_customer=customer::where('customerID',$id)->first();

    //     customer::where('customerID',$id)->delete();

    //     Session::put('message','The customer is deleted successfully');

    //     return redirect::to('/customers');
    // }

    public function view_edit($id)
    {
        $select_customer=customer::where('customerID',$id)->first();

        $manage_customer = view('admin.customer.edit')->with('select_customer',$select_customer);

        return view('admin.layouts.app')->with('admin.customer.edit',$manage_customer);
    }

    public function edit_customer(Request $req)
    {

        $select_customer = DB::table('customer')->where('customerID', $req->customer_id)
            ->first();
            DB::table('customer')->where('customerID', $req->customer_id)
            ->update(['CustomerName'=>$req->customer_name]);
            DB::table('customer')->where('customerID', $req->customer_id)
            ->update(['Password'=>$req->customer_password]);
            DB::table('customer')->where('customerID', $req->customer_id)
            ->update(['Email'=>$req->customer_email]);
            DB::table('customer')->where('customerID', $req->customer_id)
            ->update(['Address'=>$req->customer_address]);
            DB::table('customer')->where('customerID', $req->customer_id)
            ->update(['Phone'=>$req->customer_phone]);

            if($req->customer_status==1)
                DB::table('customer')->where('customerID', $req->customer_id)
                    ->update(['Status'=>1]);
            else
            DB::table('customer')->where('customerID', $req->customer_id)
                     ->update(['Status'=>0]);

        Session::put('message','The customer is updated successfully');
        return redirect::to('/customers');
    }

}
