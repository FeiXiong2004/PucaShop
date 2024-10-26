<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:10', 'unique:users,phone'],
            'address' => ['nullable'],
            'password' => ['required', 'confirmed', 'min:8'],
        ];
    }
    public function messages(): array
    {
        return [
            'fullname.required' => 'Vui lòng nhập họ tên.',
            'fullname.string' => 'Họ tên phải là một chuỗi ký tự.',
            'fullname.max' => 'Họ tên không được vượt quá :max ký tự.',

            'username.required' => 'Vui lòng nhập tên tài khoản.',
            'username.string' => 'Tên tài khoản phải là một chuỗi ký tự.',
            'username.max' => 'Tên tài khoản không được vượt quá :max ký tự.',
            'username.unique' => 'Tên tài khoản đã tồn tại. Vui lòng chọn tên tài khoản khác.',

        
        ];
    }
}
