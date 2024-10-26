<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
      
        $products=Product::paginate(10);
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create',compact('categories', 'brands'));
    }
    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'sku' => $request->sku,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ];
        Product::create($data);
        return redirect()->route('admin.product.')->with('message', 'Product created successfully');
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
    public function update(Request $request,$id){
            $product = Product::query()->findOrFail($id);
            $data = $request->except('image');

            $old_image = $product->image;
            $data['image'] = $old_image;
            if($request->hasFile('image')){
                $path_image = $request->file('image')->store('images');
                $data['image'] = $path_image;
            }

            $product->update($data);
            if($request->hasFile('image')){
                if(file_exists('storage/'.$old_image)){
                    unlink('storage/'.$old_image);
                }
            }
            return redirect()->route('admin.product.')->with('message', 'Product updated successfully');
    }
    public function destroy($id){
        $product = Product::query()->findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.')->with('message', 'Product deleted successfully');
    }

}
