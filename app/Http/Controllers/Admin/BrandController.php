<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::query()->latest('id')->paginate(5);
        return view('admin.brands.index',compact('brands'));
    }
    public function create(){
        return view('admin.brands.create');
    }
    public function store(StoreBrandRequest $request){
        
                $data = [
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status,
                ];
                Brand::create($data);
        return redirect()->route('admin.brand.')->with('message','Thêm mới thương hiệu thành công');
    }
    public function edit($id){
        $brand = Brand::query()->findOrFail($id);

        return view('admin.brands.edit', compact('brand'));
    }
    public function update(UpdateBrandRequest $request, $id){
        $brand = Brand::query()->findOrFail($id);
        $data =[
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
        ];
      
        $brand->update($data);
        return redirect()->route('admin.brand.')->with('message','Cập nhật thương hiệu thành công');
    }
    public function destroy($id){
        $brand = Brand::query()->findOrFail($id);
        $brand->delete();
        return redirect()->route('admin.brand.')->with('message','Xoá danh mục thành công');
    }
    public function changeStatus($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->status = !$brand->status; // Thay đổi trạng thái
        $brand->save();

        return response()->json([
            'success' => true,
            'message' => ($brand->status  ? 'Kích Hoạt' : 'Không Kích Hoạt'),
            'newStatus' => $brand->status
        ]);
    }
}
