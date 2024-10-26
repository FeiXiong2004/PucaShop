<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
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
                Rule::unique('categories', 'name') ->whereNull('deleted_at'),
            ],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'slug')->whereNull('deleted_at'),
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập :attribute.',
            'name.string' => ':attribute phải là một chuỗi ký tự.',
            'name.max' => ':attribute không được vượt quá :max ký tự.',
            'name.unique' => ':attribute đã tồn tại. Vui lòng chọn :attribute khác.',
            
            'description.string' => ':attribute phải là một chuỗi ký tự.',
            'description.min' => ':attribute phải có ít nhất :min ký tự.',
            'description.max' => ':attribute không được vượt quá :max ký tự.',

            'slug.required' => 'Vui lòng nhập :attribute.',
            'slug.string' => ':attribute phải là một chuỗi ký tự.',
            'slug.max' => ':attribute không được vượt quá :max ký tự.',
            'slug.unique' => ':attribute đã tồn tại. Vui lòng chọn :attribute khác.',

            'parent_id.exists' => ':attribute không tồn tại.',
            
            'status.required' => 'Vui lòng chọn :attribute.',
            'status.in' => ':attribute chọn không hợp lệ.',

            'image.image' => ':attribute phải là một tập tin hình ảnh.',
            'image.mimes' => ':attribute phải có định dạng: :values.',
            'image.max' => ':attribute không được vượt quá :max KB.',
        ];
    }
}
