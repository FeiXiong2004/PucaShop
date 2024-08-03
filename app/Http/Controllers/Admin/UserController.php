<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create')->with('message','Create successfully');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['avatar'] = "";
        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('images');
            $data['avatar'] = $path_image;
        }
        User::create($data);
        return redirect()->route('admin.user.')->with('message', 'Create Success');
    }
    public function show($id)
    {
        $user = User::query()->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }
    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update($id, Request $request)
    {
        $user = User::query()->findOrFail($id);
        // dd($user);
        $old_image = $user->avatar;
        $data['avatar'] = $old_image;
        $data = $request->except('avatar');
        $data['avatar'] = "";
        if ($request->hasFile('avatar')) {
            $path_image = $request->file('avatar')->store('images');
            $data['avatar'] = $path_image;
        }

        //Cập nhật dữ liệu
        $user->update($data);
        //Xóa file ảnh cũ
        if ($request->hasFile('avatar')) {
            if (file_exists('storage/' . $old_image)) {
                unlink('storage/' . $old_image); //Xóa file
            }
        }

        $user->update($data);

        return redirect()->route('admin.user.')->with('message', 'Update Success');
    }
    public function destroy($id)
    {   
       // Lấy người dùng hiện tại
       $currentUserId = Auth::id();
        
       // Kiểm tra xem người dùng có đang cố gắng xóa chính mình không
       if ($id == $currentUserId) {
           return redirect()->back()->with('error', 'Bạn không thể xóa chính mình!');
       }

       // Tiến hành xóa người dùng
       $user = User::find($id);
       
       if ($user) {
           $user->delete();
           return redirect()->route('admin.user')->with('success', 'Người dùng đã được xóa.');
       } 
      
    }
}
