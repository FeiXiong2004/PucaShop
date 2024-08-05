<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        Paginator::useBootstrap();
        view()->composer('*', function ($view) {
            $categories = Category::all();
            $products = Product::paginate(10);
            $highestPriceProducts = Product::query()
                ->orderBy('price', 'desc')
                ->paginate(12);

    
                // Query to filter products based on category_id if provided
                $productByCategoryQuery = Product::query()
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->select('products.*', 'categories.id as cate_id', 'categories.name as cate_name');
    
                if ($view->category_id) {
                    $productByCategoryQuery->where('products.category_id', $view->category_id);
                }
    
                $productByCategory = $productByCategoryQuery->paginate(6);
    
          
            $view->with(compact('categories', 'products', 'highestPriceProducts', 'productByCategory')); // Pass the categories to all views.
        });
        view()->composer('productDetail', function ($view) {

            if ($view->productDetail) {
                $relatedProducts = Product::where('category_id', $view->productDetail->category_id)
                    ->where('id', '!=', $view->productDetail->id)
                    ->take(10)
                    ->get();

                $view->with(compact('relatedProducts'));
            }
        });
    }
}
