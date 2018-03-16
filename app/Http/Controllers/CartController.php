<?php

namespace App\Http\Controllers;

use App\Product; // import Product Class Model
use Gloudemans\Shoppingcart\Facades\Cart; // <= config/app/aliases /import Cart Library 
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems=Cart::content(); // Fetch all cart items from Cart addItems function
        return view('cart.index',compact('cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    public function addItem($id) // Parameter => $phone->id
    {
        $product=Product::find($id); // Find product from Products table of that product id

        Cart::add($id,$product->name,1,$product->price); // Add Product contents

        return back(); // Return to index
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(Cart::content());
        //dd($request->all());

        // $id => rowId/product id, qty => qty input name, 
        Cart::update($id,['qty'=>$request->qty,"options"=>['brand'=>$request->brand]]); // $request->qty is the input data from form

        return back(); // Return to index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // $id => rowId/product id
    {
        Cart::remove($id);
        return back(); // Return to index
    }
}
