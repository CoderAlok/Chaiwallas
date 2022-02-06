<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(Request $request){
        $res = DB::table('tbl_user')->where('email', $request->input('email'))->first();
        if($res){
            if(!Hash::check($request->input('password'),$res->password)){
                return response()->json([
                    "status"=>false,
                    "message"=>"Wrong password."
                ], 400);
            }
            else{
                return response()->json([
                        "status"=>true,
                        "data"=>$res,
                        "message"=>"Customer logged in successfully."
                    ], 200);
            }
        }
        else{
            return response()->json([
                    "status"=>false,
                    "message"=>"Email doesnot exist please register."
                ], 400);
        }
    }

    public function add(Request $request){

        $chk = DB::table('tbl_user')->where('email', $request->input('email'))->get()->count();
        if(!$chk){
            $ins_data = [
                        "first_name"=>$request->input('first_name'),
                        "last_name"=>$request->input('last_name'),
                        "email"=>$request->input('email'),
                        "password"=>Hash::make($request->input('password')),
                        "role"=>$request->input('role'),
                        "is_shop"=>$request->input('is_shop'),
                        "shop_id"=>$request->input('shop_id'),
                        "status"=>$request->input('status')
                    ];
            $res = DB::table('tbl_user')->insertGetId($ins_data);
            if($res){
                return response()->json([
                    "status"=>true,
                    "message"=>"Customer registered successfully."
                ], 200);
            }
            else{
                return response()->json([
                    "status"=>false,
                    "message"=>"Failed to register customer."
                ], 200);
            }
        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"Sorry, the customer already exists."
            ], 400);
        }

    }

}
