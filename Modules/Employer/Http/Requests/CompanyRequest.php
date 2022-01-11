<?php

namespace Modules\Employer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //Tạo điều kiện ràng buộc cho bảng Company
    public function rules()
    {
        return [
            'c_name' => 'required',
            'c_phone' => 'required',
            'c_address' => 'required',
            'c_email' => 'required',
            'c_about' => 'required',
        ];
    }
    // Tạo thông báo khi không nhập đủ thông tin trên
    public function messages()
    {
        return [
            'c_name.required' => 'Dữ liệu không được để trống',
            'c_phone.required' => 'Dữ liệu không được để trống',
            'c_address.required' => 'Dữ liệu không được để trống',
            'c_email.required' => 'Dữ liệu không được để trống',
            'c_about.required' => 'Dữ liệu không được để trống',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
