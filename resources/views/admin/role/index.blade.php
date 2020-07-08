@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <h2> Role index </h2>
            &nbsp;
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <div>
                <a href="role_create" type="button" class="btn btn-primary">Create</a>
            </div>
            &nbsp;
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php $categories=DB::table('role')->get(); ?>
                <tbody>
                    @foreach($categories as $role)
                        <tr>
                            <th scope="row">{{ $role->RoleID }}</th>
                            <td>{{ $role->RoleName }}</td>

                            @if($role->Status == 1)
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
                                        href="{{ URL::to('/role_edit/'.$role->RoleID) }}">Update</a></button>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <a
                                        href="{{ URL::to('/delete_role/'.$role->RoleID) }}">Delete</a>
                                </button>

                                @if($role->Status == 1)
                                    <button class="btn btn-outline-warning"><a
                                            href="{{ URL::to('/unactivate_role/'.$role->RoleID) }}">Unactivate</a></button>
                                @else
                                    <button class="btn btn-outline-success"><a
                                            href="{{ URL::to('/activate_role/'.$role->RoleID) }}">activate</a></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
