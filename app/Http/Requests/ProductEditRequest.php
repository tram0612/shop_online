<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            
            'name' => 'required',
            'brand_id' => 'required',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'status' => 'required',
            'cat_id' => 'required',
            'sale'  =>'integer|min:0|max:100',
            //'password' => 'min:8',
            'img' => 'array|max:3',
            'img.*' =>  'image|mimes:jpeg,jpg,bmp,png,gif|max:1024',
    
        ];
    }
    public function messages()
    {
        return [
                'name.required' => 'Vui lòng nhập tên',
                'brand_id.required' => 'Vui lòng chọn hãng',
                'price.required' => 'Vui lòng nhập giá',
                'qty.required' => 'Vui lòng nhập số lượng',
                'status.required' => 'Vui lòng chọn trạng thái',
                'cat_id.required' => 'Vui lòng chọn danh mục',
                'img.max' => 'Vui lòng chọn không hơn 3 ảnh',
                'img.*.mimes' => 'Vui lòng chọn file ảnh',
                'img.*.image' => 'Vui lòng chọn file ảnh',
                'img.*.max' => 'Ảnh vượt quá dung lượng quy định',
                //'password.min' => 'Vui lòng nhập password ít nhất 8 kí tự',
                
        ];
    }
}
