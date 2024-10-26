<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class authAccountController extends Controller
{
    public function index()
    {
        return view('client.auth.authAccount');
    }
    public function handleRegister(RegisterRequest $request)
    {
        $data = $request->all();
        // dd($data);
        // Hash the password
        $data['password'] =  Hash::make($data['password']) ;

        // Create the user
        User::create($data);

        // Redirect with success message
        return redirect()->route('account')->with('success', 'Registration successful!');
    }

    public function handleLogin(Request $request)
    {

        // Xác thực dữ liệu đăng nhập
        $data = $request->only(['email', 'password']);

        if (Auth::attempt($data)) {
            // Đăng nhập thành công
            // Kiểm tra trạng thái tài khoản
            $user = Auth::user();
            if ($user->is_active === 0) {
                Auth::logout();
                return redirect()->route('account')->with('error', 'Your account has been banned');
            }

            // Chuyển hướng người dùng đến route 'home' nếu tài khoản hoạt động
            return redirect()->intended('/');
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->with('message', 'Email hoặc Password không chính xác');
        }
    }
    public function showAccount($id)
    {
        $user = User::query()->findOrFail($id);
        return view('client.auth.updateAccount', compact('user'));
    }
    public function showPassword($id)
    {
        $user = User::query()->findOrFail($id);
        return view('client.auth.updatePassword', compact('user'));
    }
    public function handleUpdateAccount($id, Request $request)
    {
        $user = User::query()->findOrFail($id);

        // Lấy tất cả dữ liệu từ request trừ avatar
        $data = $request->except('avatar');
        $old_image = $user->avatar;
        $data['avatar'] = $old_image;

        // // Kiểm tra nếu có file mới được tải lên
        if ($request->hasFile('avatar')) {
            // Xóa file avatar cũ nếu tồn tại
            if ($old_image && Storage::exists($old_image)) {
                Storage::delete($old_image);
            }

            // Lưu file avatar mới
            $path_image = $request->file('avatar')->store('images');
            $data['avatar'] = $path_image;
        }
    
        // Cập nhật dữ liệu
         $user->save();
        return redirect()->route('home');
    }
    public function handleUpdatePassword($id, Request $request)
    {

        // Validate the request data    
        $validatedData = $request->validate([
            'current_password' => ['required'],  // Add validation for current password
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'password.confirmed' => 'Password and confirmation password must match.',
            'current_password.required' => 'Current password is required.',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Check if the current password matches
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Hash the new password
        $hashedPassword = Hash::make($validatedData['password']);

        // Update the user's password
        $user->update(['password' => $hashedPassword]);

        // Redirect to the account page with a success message
        return redirect()->route('account')->with('success', 'Password updated successfully.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
