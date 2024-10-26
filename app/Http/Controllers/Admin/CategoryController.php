<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $getParentCategories;
    public function __construct()
    {
        $this->getParentCategories = $this->generateParentCategories();
    }
    public function generateParentCategories($parent_id = null, $text = "", $selectID = null)
    {
        $categories = Category::where('parent_id', $parent_id)->get();
        $result = "";
        foreach ($categories as $category) {
            $selected = ($selectID === $category->id) ? 'selected' : '';
            $result .=  "<option value='{$category->id}' {$selected}>" . htmlspecialchars($text . $category->name) . "</option>";
            $result .= $this->generateParentCategories($category->id, $text . '-', $selectID);
        }
        return $result;
    }
    public function index()
    {
        // Paginate the categories, showing 10 per page
        $categories = Category::query()->latest('id')->paginate(5);
        // Pass the paginated categories to the view

        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        $getCategories = $this->getParentCategories;
        return view('admin.categories.create', compact('getCategories'));
    }
    public function store(StoreCategoryRequest $request)
    {

        // Lấy slug từ yêu cầu
        $slug = $request->slug;

        // Kiểm tra xem có danh mục nào đã bị xóa mềm với slug này không
        // $trashedCategory = Category::onlyTrashed()->where('slug', $slug)->first();

        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'image' => $request->hasFile('image') ? $request->image->store('images') : null,
            'is_active' => $request->input('is_active'),
        ];

        // if ($trashedCategory) {
        //     // Nếu danh mục đã bị xóa mềm, phục hồi và cập nhật
        //     $trashedCategory->restore(); // Phục hồi danh mục đã xóa

        //     // Cập nhật slug cho danh mục đã phục hồi
        //     $trashedCategory->update(array_merge($data, ['slug' => $slug]));

        //     return redirect()->route('admin.category.')->with('message', 'Danh mục đã được phục hồi thành công');
        // }

        $data['slug'] = $slug;
        // dd($data);
        Category::create($data);
        return redirect()->route('admin.category.')->with('message', 'Thêm mới danh mục thành công');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $getCategories = $this->generateParentCategories(null, '', $category->parent_id);
        // dd($getCategories);
        return view('admin.categories.edit', compact('category', 'getCategories'));
    }
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->except('image');
        $data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'image' => $request->hasFile('image') ? $request->image->store('images') : null,
            'is_active' => (int) $request->is_active,
        ];

        $old_image = $category->image;
        $data['image'] = $old_image;
        if ($request->hasFile('image')) {
            if (file_exists('storage/' . $old_image)) {
                unlink('storage/' . $old_image);
            }
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        // dd($data);S
        $category->update($data);
        return redirect()->route('admin.category.')->with('message', 'Cập nhật danh mục thành công');
    }
    public function destroy($id)
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category.')->with('message', 'Xoá danh mục thành công');
    }

    public function changeStatus($id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = !$category->is_active; // Thay đổi trạng thái
        $category->save();

        return response()->json([
            'success' => true,
            'message' => ($category->is_active ? 'Kích Hoạt' : 'Không Kích Hoạt'),
            'newStatus' => $category->is_active
        ]);
    }
}
