<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestRegister;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function postRegister(RequestRegister $request)
    {
        if($request->ajax())
        {
            $data = $request->except('_token');
            // Mã hóa mật khẩu
            $data ['password'] = bcrypt($request->password);
            //Tạo tài khoản user
            $user = User::create($data);
            if($user)
            {
                \Auth::guard('users')->login($user);
            }
            return response()->json($data);
        }
    }
}
