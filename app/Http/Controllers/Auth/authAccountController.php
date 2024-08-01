<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;


class authAccountController extends Controller
{
    public function index()
    {
        return view('auth.authAccount');
    }
    public function handleRegister(Request $request)
    {
        $validatedData = $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'password.confirmed' => 'Password and confirmation password must match.',
        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the user
        User::create($validatedData);

        // Redirect with success message
        return redirect()->route('account')->with('success', 'Registration successful!');
    }

    public function handleLogin(Request $request)
    {

        $data = $request->only(['email', 'password']);
        //Kiểm tra đăng nhập]
        if (Auth::attempt($data)) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('message', 'Email hoặc Password không chính xác');
        }
    }
    public function showAccount($id)
    {
        $user = User::query()->findOrFail($id);
        return view('auth.updateAccount', compact('user'));
    }
    public function showPassword($id)
    {
        $user = User::query()->findOrFail($id);
        return view('auth.updatePassword', compact('user'));
    }
    public function handleUpdateAccount($id, Request $request)
    {
        $user = User::query()->findOrFail($id);

        $data = $request->all();
        // $data['avatar'] = "";
        // if ($request->hasFile('image')) {
        //     $path_image = $request->file('image')->store('images');
        //     $data['image'] = $path_image;
        // }
        // $old_image = $user->avatar;
        // $data['avatar'] = $old_image;
        // //Cập nhật dữ liệu
        // $user->update($data);
        // //Xóa file ảnh cũ
        // if ($request->hasFile('image')) {
        //     if (file_exists('storage/' . $old_image)) {
        //         unlink('storage/' . $old_image); //Xóa file
        //     }
        // }

        $user->update($data);
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
