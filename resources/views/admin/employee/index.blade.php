@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Employee index </h2>
            &nbsp;
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <div>
                <a href="employee_create" type="button" class="btn btn-primary">Create</a>
            </div>
            &nbsp;
            <form action="search_employee" method="get" enctype="multipart/form-data" class="form-horizontal" >
                <div class="input-group">
                    <input  type="text" id="input1-group2" name="input_data" placeholder="Search" class="form-control">
                    <div class="input-group-btn">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>
                </div>
            </form>
            &nbsp;
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                
                
                <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <th scope="row">{{ $employee->EmployeeID }}</th>
                            <td>{{ $employee->Name }}</td> 
                            <td>{{$employee->Role}}</td>
                            <td>{{ $employee->Phone }}</td>
                            <td>{{ $employee->Email }}</td>
                            @if($employee->Role == "Employee")
                            @if($employee->Status == 1)
                                <td>
                                    <label class="badge badge-success">Activated</label>
                                </td>
                            @else
                                <td>
                                    <label class="badge badge-danger">Unactivated</label>
                                </td>
                            @endif

                            <td>
                                <button class="btn btn-outline-primary"><a
                                    href="{{ URL::to('/employee_edit/'.$employee->EmployeeID) }}">Update</a></button>

                                {{-- <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal"> 
                                    <a onclick="return confirm('Are you sure?')" href="{{ URL::to('/delete_employee/'.$employee->EmployeeID) }}">Delete</a>
                                </button> --}}

                                @if($employee->Status == 1)
                                    <button class="btn btn-outline-warning"><a
                                            href="{{ URL::to('/unactivate_employee/'.$employee->EmployeeID) }}">Unactivate</a></button>
                                @else
                                    <button class="btn btn-outline-success"><a
                                            href="{{ URL::to('/activate_employee/'.$employee->EmployeeID) }}">activate</a></button>
                                @endif
                            </td>
                            @else
                            <td></td>
                            <td>
                                <button class="btn btn-outline-primary"><a
                                    href="{{ URL::to('/employee_edit/'.$employee->EmployeeID) }}">Update</a></button>
                                </td>
                            @endif
                        </tr>

                    @endforeach
                </tbody>
            </table>
            {{$employees->links()}}
        </div>
    </div>
</div>


@endsection
