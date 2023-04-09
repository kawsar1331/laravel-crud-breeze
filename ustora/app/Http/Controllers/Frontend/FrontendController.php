<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class FrontendController extends Controller
{
    //Index View
    public function index() {
        $products = Product::all();
        return view('frontend.index', compact('products'));
    }
    //Shop View
    public function shop() {
        return view('frontend.shop');
    }
    //Single Product View
    public function singleproduct() {
        return view('frontend.single-product');
    }
    //Single Product1 View
    public function singleproduct1($id) {
        $product = Product::find($id);
        return view('frontend.single-product1', compact('product'));
    }
    //Cart View
    public function cart() {
        return view('frontend.cart');
    }
    //Checkout View
    public function checkout() {
        return view('frontend.checkout');
    }
}
