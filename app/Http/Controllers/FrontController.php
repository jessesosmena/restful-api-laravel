<?php

namespace App\Http\Controllers;

use App\Product; // import Product Class Model
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() 
    {
        $phones=Product::all(); // Get all data from product model
        return view('front.home',compact('phones')); // Will be redirected to resources/views/front/home.blade.php
    }

    public function phones() 
    {
        $phones=Product::all();
        return view('front.phones',compact('phones')); // Will be redirected to resources/views/front/phones.blade.php
    }

    public function phone($id) 
    {
        $phone=Product::find($id);
        return view('front.phone',compact('phone')); // Will be redirected to resources/views/front/phone.blade.php
    }
}
