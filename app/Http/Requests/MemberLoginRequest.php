<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberLoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' =>  'required|min:8|max:20',
        ];
    }
    public function messages()
    {
        return [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Vui lòng nhập email',
                'password.required' => 'Vui lòng nhập pass',
                'password.min' => 'Password phải ko ít hơn 8 kí tự và ko quá 20 kí tự',
                'password.max' => 'Password phải ko ít hơn 8 kí tự và ko quá 20 kí tự',
        ];
    }
}
