<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    public function productDetail($id){
        $productDetail = Product::query()->findOrFail($id);
        $comments = $productDetail->comments()->with('user')->get();
        return view('productDetail', compact('productDetail','comments'));
        
    }
    public   function blogDetail($id){
        $post = Post::query()->findOrFail($id);
        return view('blogDetail', compact('post'));
    }
}
