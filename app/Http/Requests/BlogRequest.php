<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'image' =>  'required|image|mimes:jpeg,jpg,bmp,png,gif|max:2048',
        ];
    }
    public function messages()
    {
        return [
                'title.required' => 'Vui lòng nhập tên tin',
                 'image.required' => 'Vui lòng chọn ảnh',
                'image.mimes' => 'Vui lòng chọn ảnh',
                'image.image' => 'Vui lòng chọn ảnh',
                'image.max' => 'Ảnh vượt quá dung lượng quy định',
        ];
    }
}
