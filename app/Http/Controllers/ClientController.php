<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function cart()
    {
        return view('client.cart');
    }

    public function category()
    {
        return view('client.category');
    }

    public function checkout()
    {
        return view('client.checkout');
    }

    public function contact()
    {
        return view('client.contact');
    }
}
