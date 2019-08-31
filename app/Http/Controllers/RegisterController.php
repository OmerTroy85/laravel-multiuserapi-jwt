<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JsonReturn;
use App\User;
use App\Companies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function userRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return JsonReturn::error($validator->messages());
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $data = [
                'message' => 'User Account Created Successfully',
            ];

            return JsonReturn::success($data);

        }
    }

    public function companiesRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:companies',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return JsonReturn::error($validator->messages());
        } else {
            $company = Companies::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $data = [
                'message' => 'Companies Account Created Successfully',
            ];

            return JsonReturn::success($data);

        }
    }

}
