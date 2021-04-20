<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMemberRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'min:8|max:20',
            'avarta' =>  'image|mimes:jpeg,jpg,bmp,png,gif|max:2048',
        ];
       
    }
    public function messages()
    {
        return [
                'name.required' => 'Vui lòng nhập tên',
                'email.required' => 'Vui lòng nhạp email',
                'email.email' => 'Vui lòng nhạp email',
                'password.min' => 'Vui lòng nhập password ít nhất 8 kí tự và nhiều nhất 20',
                'password.max' => 'Vui lòng nhập password ít nhất 8 kí tự và nhiều nhất 20',
                'email.unique' => 'Email này đã được sử dụng',
                'avarta.image' => 'Vui lòng chọn ảnh',
                'avarta.mimes' => 'Vui lòng chọn ảnh',
                'avarta.max' => 'Ảnh vượt quá dung lượng quy định',
                //'password.min' => 'Vui lòng nhập password ít nhất 8 kí tự',
                
        ];
    }
}
