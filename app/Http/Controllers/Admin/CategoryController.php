<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {
        // Paginate the categories, showing 10 per page
        $categoriesAdmin = Category::paginate(10);

        // Pass the paginated categories to the view
        return view('admin.categories.index', compact('categoriesAdmin'));
    }
    public function create(){
        return view('admin.categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' =>'required|unique:categories,name',
        ]);
        Category::create($request->all());
        return redirect()->route('admin.category.')->with('success', 'Category created successfully');
    }
    public function edit($id){
        $category = Category::query()->findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' =>'required|unique:categories,name,'.$id,
        ]);
        $category = Category::query()->findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin.category.')->with('success', 'Category updated successfully');
    }
    public function destroy($id){
        $category = Category::query()->findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.')->with('success', 'Category deleted successfully');
    }
}