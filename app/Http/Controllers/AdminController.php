<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }

    public function product()
    {
        return view('admin.products.edit');
    }

    public function create_category()
    {
        return view('admin.category.create');
    }
}
