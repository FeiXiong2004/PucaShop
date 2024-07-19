<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function productDetail($id){
        $productDetail = Product::query()->findOrFail($id);
        return view('productDetail', compact('productDetail'));
        
    }
}
