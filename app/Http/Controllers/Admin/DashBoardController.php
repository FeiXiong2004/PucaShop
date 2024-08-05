<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
       
        // Tổng số sản phẩm
        $totalProducts = Product::count();

        // Tổng số sản phẩm của mỗi danh mục
        $productsByCategory = Category::withCount('products')->get();

        $totalPosts = Post::count();
        

        return view('admin.dashboard', compact('totalProducts', 'productsByCategory','totalPosts'));
    }
}
