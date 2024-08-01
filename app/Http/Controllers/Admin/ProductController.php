<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $productsAdmin=Product::paginate(10);
        return view('admin.products.index',compact('productsAdmin'));
    }
    public function create(){
        return view('admin.products.create');
    }
    public function show($id){

        $product=Product::query()->findOrFail($id);
        $categories =Category::all();
        return view('admin.products.show',compact('product', 'categories'));
    }
    public function edit($id){
        $product=Product::query()->findOrFail($id);
        $categories =Category::all();
        return view('admin.products.edit',compact('product', 'categories'));
    }
    public function update($id){

    }
    public function destroy($id){

    }

}
