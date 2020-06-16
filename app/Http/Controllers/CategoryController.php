<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Category;

class CategoryController extends Controller
{
    public function view_index()
    {
        
        return view ('admin.category.index');
    }

    public function view_create()
    {
        return view('admin.category.create');
    }

    public function create(Request $req)
    {
        $category=new Category;
        $category->CategoryName=$req->category_name;
        if($req->category_status==1)
            $category->Status=1;
        else
            $category->Status=0;
        $category->save();
        Session::put('message','The category is added successfully');
        return redirect::to('/view_category_index');
    }
}
