<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        
        return view('admin.users.index',compact('users'));
    }
    public function edit($id){
        $user = User::query()->findOrFail($id);
        return view('admin.users.edit', compact('user'));       
    }
    public function update($id,Request $request){
        $user = User::query()->findOrFail($id);
        $data = $request->except('avatar');
        $data['avatar'] = "";
        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('images');
            $data['avatar'] = $path_image;
        }
        $old_image = $user->avatar;
        $data['avatar'] = $old_image;
        //Cập nhật dữ liệu
        $user->update($data);
        //Xóa file ảnh cũ
        if ($request->hasFile('avatar')) {
            if (file_exists('storage/' . $old_image)) {
                unlink('storage/' . $old_image); //Xóa file
            }
        }

        $user->update($data);
       

        $user->update($data);
        return redirect()->route('admin.users.');
    }

}
