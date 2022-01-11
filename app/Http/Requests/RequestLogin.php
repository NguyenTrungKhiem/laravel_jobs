<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
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
        // RÀNG BUỘC DỮ LIỆU TẠO CÁC DIỀU KIỆN.
        return [
            'email'     => 'required',
            'password'  => 'required',
        ];
    }
    public function messages() //Tạo thông báo khi nhập thiếu dữ liệu
    {
        return [
            'email.required' => 'Dữ liệu không được để trống',
            'password.required' => 'Dữ liệu không được để trống',
        ];
    }
}
