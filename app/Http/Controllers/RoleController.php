<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use File;
use App\Role;

class RoleController extends Controller
{
    public function view_index()
    {
        
        return view ('admin.role.index');
    }

    public function view_create()
    {
        return view('admin.role.create');
    }

    public function create(Request $req)
    {
        $role=new Role;
        $role->RoleName=$req->role_name;
        if($req->role_status==1)
            $role->Status=1;
        else
            $role->Status=0;
        $role->save();
        Session::put('message','The role is added successfully');
        return redirect::to('/roles');
    }


    public function unactivate_role($id)
    {
        Role::where('RoleID',$id)->update(['Status'=>0]);

        Session::put('message','The role is unactivated successfully');

        return redirect::to('/roles');
    }

    public function activate_role($id)
    {
        Role::where('roleID',$id)->update(['Status'=>1]);

        Session::put('message','The role is activated successfully');

        return redirect::to('/roles');
    }

    public function delete_role($id)
    {
        $select_role=Role::where('RoleID',$id)->first();

        Role::where('RoleID',$id)->delete();

        Session::put('message','The role is deleted successfully');

        return redirect::to('/roles');
    }

    public function view_edit($id)
    {
        $select_role=Role::where('RoleID',$id)->first();

        $manage_role = view('admin.role.edit')->with('select_role',$select_role);

        return view('admin.layouts.app')->with('admin.role.edit',$manage_role);
    }

    public function edit_role(Request $req)
    {

        $select_role = DB::table('role')->where('RoleID', $req->role_id)
            ->first();
            DB::table('role')->where('roleID', $req->role_id)
            ->update(['RoleName'=>$req->role_name]);

        Session::put('message','The role is updated successfully');
        return redirect::to('/roles');
    }
}
