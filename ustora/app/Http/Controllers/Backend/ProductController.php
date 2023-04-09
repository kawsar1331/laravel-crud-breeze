<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    //Add Product
    public function addproduct() {
        return view('backend.addproduct');
    }
    public function addedproduct(request $request) {

        $request->validate([
            'name' => 'required',
            'category_name' => 'required',
            'brand_name' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        $product = new Product();
        
        $product->name = $request->name;
        $product->category_name = $request->category_name;
        $product->brand_name = $request->brand_name;
        $product->description = $request->description;

        $imageName = "";
        if($image = ($request->file('image'))){
            $imageName = time()."-".uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products/',$imageName);
        }

        $product->image = $imageName;
        $product->status = $request->status;

        $product->save();
        
        return redirect(Route('manageproduct'));

    }
    //Edit Product
    public function editproduct($id) {
        
        $product = Product::find($id);
        
        return view('backend.editproduct', compact('product'));
        
    }
    public function updateproduct(request $request, $id) {

        $product = Product::find($id);
        
        $product->name = $request->name;
        $product->category_name = $request->category_name;
        $product->brand_name = $request->brand_name;
        $product->description = $request->description;

        $imageName = "";
        $deleteOldImage = 'images/products/'.$product->image;

        if($image = ($request->file('image'))){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }

            $imageName = time()."-".uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products/',$imageName);
            $product->image = $imageName;
        } else {

            $imageName = $product->image;
        }
        
        $product->status = $request->status;

        $product->update();
        
        return redirect(Route('manageproduct'));

    }
    //Show Product
    public function manageproduct() {
        $products = Product::all();
        return view('backend.manageproduct', compact('products'));
    }
    // Delete Product
    public function deleteproduct($id){
        $product = Product::find($id);
        $deleteOldImage = 'images/products/'.$product->image;
        if(file_exists($deleteOldImage)){
            File::delete($deleteOldImage);
        }
        $product->delete();
        return redirect(Route('manageproduct'));
    }
    public function active($pid) {
        $product=Product::find($pid);

        $product->status='1';
        $product->update();
        return back();
        
    }
    
    public function inactive($pid) {
        $product=Product::find($pid);
        
        $product->status='0';
        $product->update(); 
        return back();

    }
}
