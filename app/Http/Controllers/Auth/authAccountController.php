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
    public function index(){
        return view('auth.authAccount');
    }
    public function handleRegister(Request $request){
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

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
