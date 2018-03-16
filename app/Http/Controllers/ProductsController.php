<?php

namespace App\Http\Controllers;

use App\Category; // import Category Class Model
use App\Product; // import Product Class Model
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all(); // Get all Product Model data
        return view('admin.product.index',compact('products')); // resources/views/admin/product/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id'); // Get all data from categories table => pluck get everything
        return view('admin.product.create',compact('categories')); // resources/views/admin/product/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // store => insert data to database
    {
        $formInput=$request->except('image'); // Get uploaded files from form except image

        // validation
        $this->validate($request,[
            'name'=>'required',
            'brand'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);
        
        $image=$request->image; // Get image from form file input
        if($image){ // if image is available
            $imageName=$image->getClientOriginalName(); // Get image original name / Returns the original file name
            $image->move('images',$imageName); // Move image file to public/images folder 
            $formInput['image']=$imageName; // Store image name & file name in image column in products table
        }

        Product::create($formInput); // Insert/store form $request data to products table
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $categories=Category::pluck('name','id');
        return view('admin.product.edit',compact(['product','categories']));
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
        $product=Product::find($id);
        $formInput=$request->except('image');

//        validation
        $this->validate($request,[
            'name'=>'required',
            'brand'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        //        image upload
        $image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }

         $product->update($formInput);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back();
    }

    public function uploadImages($productId,Request $request)
    {

            
        $product=Product::find($productId);

        // image upload
        $image=$request->file('file');

        if($image){
            $imageName=time(). $image->getClientOriginalName();
            $image->move('images',$imageName);
            $imagePath= "/images/$imageName";
            $product->images()->create(['image_path'=>$imagePath]);
        }

        return "done";
        // Product::create($formInput);
    }
}
