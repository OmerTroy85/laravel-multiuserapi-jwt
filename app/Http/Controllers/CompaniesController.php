<?php

namespace App\Http\Controllers;

use App\JsonReturn;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:companies');
    }

    public function demo()
    {
        return 'Companies Demo Function';
    }

    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return JsonReturn::error($validator->messages());
        } else {
            $companyID = Auth::id();
            Products::create([
                'name' => $request->name,
                'price' => $request->price,
                'added_by_id' => $companyID,
                'account_type' => 'Companies'
            ]);

            $data = [
                'message' => 'Product added by company account'
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
            $companyID = Auth::id();
            Products::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'added_by_id' => $companyID,
                'account_type' => 'Companies'
            ]);

            $data = [
                'message' => 'Product updated by company account'
            ];
            return JsonReturn::success($data);
        }

    }

    public function delete(Request $request, $id){
        Products::where('id', $id)->delete();

        $data = [
            'message' => 'Product deleted by company account'
        ];
        return JsonReturn::success($data);

    }
}
