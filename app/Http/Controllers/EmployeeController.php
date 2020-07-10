<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use File;
use App\employee;

class EmployeeController extends Controller
{
    public function view_index()
    {
        $employees = DB::table('employee')->paginate(1);
        return view ('admin.employee.index',['employees'=>$employees]);
    }

    public function view_create()
    {
        return view('admin.employee.create');
    }

    public function search_employee(Request $req)
    {
        $employees = Employee::where('Name','LIKE','%'.$req->input_data.'%')
        ->orWhere('EmployeeID','LIKE','%'.$req->input_data.'%')->paginate(10);
        return view('admin.employee.index', ['employees' => $employees]);
    }

    public function create(Request $req)
    {
            $employee=new Employee;
            $employee->Name=$req->employee_name;
            $employee->Password=$req->employee_password;
            $employee->Email=$req->employee_email;
            $employee->Address=$req->employee_address;
            $employee->Phone=$req->employee_phone;
            $employee->HireDate=$req->employee_hiredate;
            $employee->BasicSalary=$req->employee_basicsalary;
            $employee->Coefficient=$req->employee_coefficient;
            $employee->RoleID=$req->employee_roleid;
            if($req->employee_status==1)
                $employee->Status=1;
            else
                $employee->Status=0;

        $employee->save();
        Session::put('message','The employee is added successfully');
        return redirect::to('/employees');
    }

    public function unactivate_employee($id)
    {
        employee::where('employeeID',$id)->update(['Status'=>0]);
        return redirect::to('/employees');
    }

    public function activate_employee($id)
    {
        employee::where('employeeID',$id)->update(['Status'=>1]);
        return redirect::to('/employees');
    }

    public function delete_employee($id)
    {
        $select_employee=employee::where('employeeID',$id)->first();

        employee::where('employeeID',$id)->delete();

        Session::put('message','The employee is deleted successfully');

        return redirect::to('/employees');
    }

    public function view_edit($id)
    {
        $select_employee=employee::where('employeeID',$id)->first();

        $manage_employee = view('admin.employee.edit')->with('select_employee',$select_employee);

        return view('admin.layouts.app')->with('admin.employee.edit',$manage_employee);
    }

    public function edit_employee(Request $req) 
    {

        $select_employee = DB::table('employee')->where('employeeID', $req->employee_id)
            ->first();
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['Name'=>$req->employee_name]);
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['Password'=>$req->employee_password]);
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['Email'=>$req->employee_email]);
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['Address'=>$req->employee_address]);
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['Phone'=>$req->employee_phone]);
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['HireDate'=>$req->employee_hiredate]);
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['BasicSalary'=>$req->employee_basicsalary]);
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['Coefficient'=>$req->employee_coefficient]);
            DB::table('employee')->where('employeeID', $req->employee_id)
            ->update(['RoleID'=>$req->employee_roleid]);

            if($req->employee_status==1)
                DB::table('employee')->where('employeeID', $req->employee_id)
                    ->update(['Status'=>1]);
            else
            DB::table('employee')->where('employeeID', $req->employee_id)
                     ->update(['Status'=>0]);

        Session::put('message','The employee is updated successfully');
        return redirect::to('/employees');
    }

}
