<?php

namespace App\Http\Controllers;

use App\JsonReturn;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Products;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function demo(){
        return 'Users Demo Function';
    }

    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return JsonReturn::error($validator->messages());
        } else {
            $userID = Auth::id();
            Products::create([
               'name' => $request->name,
                'price' => $request->price,
                'added_by_id' => $userID,
                'account_type' => 'Users'
            ]);

            $data = [
                'message' => 'Product added by user account'
            ];
            return JsonReturn::success($data);

        }

    }

    public function view(Request $request, $id){

        $data['product'] = Products::where('id', $id)->first();
        $data['message'] = 'Product Retrieved Successfully';
        return JsonReturn::success($data);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return JsonReturn::error($validator->messages());
        } else {
            $userID = Auth::id();
            Products::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'added_by_id' => $userID,
                'account_type' => 'Users'
            ]);

            $data = [
                'message' => 'Product updated by user account'
            ];
            return JsonReturn::success($data);
        }

    }


    public function delete(Request $request, $id){
        Products::where('id', $id)->delete();

        $data = [
            'message' => 'Product deleted by user account'
        ];
        return JsonReturn::success($data);

    }
}
