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
            'name' =>'required',
            'image' =>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        Category::create($data);
        return redirect()->route('admin.category.')->with('message', 'Category created successfully');
    }
    public function edit($id){
        $category = Category::query()->findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, $id){

        $category = Category::query()->findOrFail($id);
        $data = $request->except('image');
        $old_image = $category->image;
        $data['image'] = $old_image;
        if ($request->hasFile('image')) {
            if (file_exists('storage/'. $old_image)) {
                unlink('storage/'. $old_image);
            }
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        $category->update($data);
        return redirect()->route('admin.category.')->with('message', 'Category updated successfully');
    }
    public function destroy($id){
        $category = Category::query()->findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.')->with('message', 'Category deleted successfully');
    }
}