<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email' => 'required',
            //'password' => 'min:8',
            'avarta' =>  'image|mimes:jpeg,jpg,bmp,png,gif|max:2048',
        ];
    }

     public function messages()
    {
        return [
                'name.required' => 'Vui lòng nhập tên',
                'email.required' => 'Vui lòng nhạp email',
                'avarta.mimes' => 'Vui lòng chọn ảnh',
                'avarta.max' => 'Ảnh vượt quá dung lượng quy định',
                //'password.min' => 'Vui lòng nhập password ít nhất 8 kí tự',
                
        ];
    }
}
