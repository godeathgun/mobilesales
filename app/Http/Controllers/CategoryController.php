<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Session;
use File;
use App\Category;

class CategoryController extends Controller
{
    public function view_index()
    {
        $categories = DB::table("category")->paginate(10);
        return view ('admin.category.index',['categories'=>$categories]);
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
        return redirect::to('/categories');
    }


    public function unactivate_category($id)
    {
        Category::where('CategoryID',$id)->update(['Status'=>0]);

        Session::put('message','The category is unactivated successfully');

        return redirect::to('/categories');
    }

    public function activate_category($id)
    {
        Category::where('categoryID',$id)->update(['Status'=>1]);

        Session::put('message','The category is activated successfully');

        return redirect::to('/categories');
    }

    public function delete_category($id)
    {
        $select_category=Category::where('CategoryID',$id)->first();

        Category::where('CategoryID',$id)->delete();

        Session::put('message','The category is deleted successfully');

        return redirect::to('/categories');
    }

    public function view_edit($id)
    {
        $select_category=Category::where('CategoryID',$id)->first();

        $manage_category = view('admin.category.edit')->with('select_category',$select_category);

        return view('admin.layouts.app')->with('admin.category.edit',$manage_category);
    }

    public function edit_category(Request $req)
    {

        $select_category = DB::table('category')->where('CategoryID', $req->category_id)
            ->first();
            DB::table('category')->where('categoryID', $req->category_id)
            ->update(['CategoryName'=>$req->category_name]);

        Session::put('message','The category is updated successfully');
        return redirect::to('/categories');
    }
}
