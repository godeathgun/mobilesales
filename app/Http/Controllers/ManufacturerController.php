<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use File;
use App\Manufacturer;

class ManufacturerController extends Controller
{
    public function view_index()
    {
        $manufacturers = DB::table('manufacturer')->paginate(10);
        return view ('admin.manufacturer.index',['manufacturers'=>$manufacturers]);
    }

    public function view_create()
    {
        return view('admin.manufacturer.create');
    }

    public function search_manufacturer(Request $req)
    {
        $manufacturers = Manufacturer::where('ManufacturerName','LIKE','%'.$req->input_data.'%')
        ->orWhere('ManufacturerID','LIKE','%'.$req->input_data.'%')->paginate(10);
        return view('admin.manufacturer.index', ['manufacturers' => $manufacturers]);
    }

    public function create(Request $req)
    {
        $manufacturer=new Manufacturer;
        $manufacturer->ManufacturerName=$req->manufacturer_name;
        if($req->manufacturer_status==1)
            $manufacturer->Status=1;
        else
            $manufacturer->Status=0;
        $manufacturer->save();
        Session::put('message','The manufacturer is added successfully');
        return redirect::to('/manufacturers');
    }


    public function unactivate_manufacturer($id)
    {
        Manufacturer::where('ManufacturerID',$id)->update(['Status'=>0]);

        Session::put('message','The manufacturer is unactivated successfully');

        return redirect::to('/manufacturers');
    }

    public function activate_manufacturer($id)
    {
        Manufacturer::where('manufacturerID',$id)->update(['Status'=>1]);

        Session::put('message','The manufacturer is activated successfully');

        return redirect::to('/manufacturers');
    }

    // public function delete_manufacturer($id)
    // {
    //     $select_manufacturer=Manufacturer::where('ManufacturerID',$id)->first();

    //     Manufacturer::where('ManufacturerID',$id)->delete();

    //     Session::put('message','The manufacturer is deleted successfully');

    //     return redirect::to('/manufacturers');
    // }

    public function view_edit($id)
    {
        $select_manufacturer=Manufacturer::where('ManufacturerID',$id)->first();

        $manage_manufacturer = view('admin.manufacturer.edit')->with('select_manufacturer',$select_manufacturer);

        return view('admin.layouts.app')->with('admin.manufacturer.edit',$manage_manufacturer);
    }

    public function edit_manufacturer(Request $req)
    {

        $select_manufacturer = DB::table('manufacturer')->where('ManufacturerID', $req->manufacturer_id)
            ->first();
            DB::table('manufacturer')->where('manufacturerID', $req->manufacturer_id)
            ->update(['ManufacturerName'=>$req->manufacturer_name]);

        Session::put('message','The manufacturer is updated successfully');
        return redirect::to('/manufacturers');
    }
}
