@extends('admin.layouts.app')

@section('content')
<div class="content">
    <div class="card-body card-block">
        <div class="card-body">
            <?php $message = Session::get('message');?>
            @if($message)
                <p class="alert alert-success">
                    <?php echo $message;
                Session::put('message',null); ?>
                </p>
            @endif
            <a href="view_category_create" type="button" class="btn btn-primary">Create</a>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <?php $categories=DB::table('category')->get(); ?>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->CategoryID }}</th>
                            <td>{{ $category->CategoryName }}</td>
                            <td>{{ $category->Status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
