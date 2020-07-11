@extends('admin.layouts.app')

@section('content')
<div class="content">
    <h2> Employee edit </h2>
    &nbsp;
    <div class="card-body card-block">
        <form action="{{ action('EmployeeController@edit_employee') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Employee Name</label>
                    <input hidden value="{{$select_employee->EmployeeID}}" id="cname" class="form-control" name="employee_id" type="text" required>
                <input value="{{$select_employee->Name}}" id="cname" class="form-control" name="employee_name" type="text" required>
                </div>
            </div>
            @if($select_employee->Role=="Admin")
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Password</label>
                    <input value="" id="cname" class="form-control" name="employee_password" type="password">
                </div>
            </div>
            @else
            @endif  
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Email</label>
                    <input value="{{$select_employee->Email}}" id="cname" class="form-control" name="employee_email" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Address</label>
                    <input value="{{$select_employee->Address}}" id="cname" class="form-control" name="employee_address" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Phone</label>
                    <input value="{{$select_employee->Phone}}" id="cname" class="form-control" name="employee_phone" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">HireDate</label>
                    <input value="{{$select_employee->HireDate}}" id="cname" class="form-control" name="employee_hiredate" type="date" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">BasicSalary</label>
                    <input value="{{$select_employee->BasicSalary}}" id="cname" class="form-control" name="employee_basicsalary" type="text" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="cname" class=" form-control-label">Coefficient</label>
                    <input value="{{$select_employee->Coefficient}}" id="cname" class="form-control" name="employee_coefficient" type="text" required>
                </div>
            </div>

            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                <div class="col col-md-9">
                    <div class="form-check">
                        <div class="checkbox">
                            <label for="checkbox1" class="form-check-label ">
                            <input type="checkbox" id="checkbox1" name="employee_status" value="{{$select_employee->Status}}"
                                    class="form-check-input">True
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <input class="btn btn-primary" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
