<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brands', 'name') ->whereNull('deleted_at')->ignore($this->route('id')),
            ],
            'description' =>'required|string|max:255',

        ];

    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập thương hiệu',
            'name.string' => 'Thương Hiệu phải là một chuỗi kí tự',
            'name.max' => 'Tên thương hiệu không vượt quá 255 kí tự',
          

            'description.required' => 'Vui lòng nhập mô tả',
            'description.string' => 'Mô tả phải là một chuỗi kí tự',
            'description.max' => 'Mô tả không quá 250 kí tự',
        ];
    }

}
