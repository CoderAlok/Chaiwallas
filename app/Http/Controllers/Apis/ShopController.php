<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    // To get all the roles list
    public function list($id = null){

        if($id){
            $roles = DB::table('tbl_shop')->where('id', $id)->first();
        }
        else{
            $roles = DB::table('tbl_shop')->get();
        }

        return response()->json([
            "status" => true,
            "data" => $roles,
            "message" => "List of all the shop."
        ], 200);

    }
    
    // To get all the shop list by pincode
    public function list_by_pincode($pincode = null){
        if($pincode){
            
            if(strpos($pincode, ',') !== false){
                
                $pincodess = explode(',', $pincode);
                
                $shops = DB::table('tbl_shop')
                        ->whereIn('pincode', $pincodess)
                        ->orderBy('id', 'desc')
                        ->get();
            }
            else{
                $shops = DB::table('tbl_shop')
                        ->where('pincode', $pincode)
                        ->orderBy('id', 'desc')
                        ->get();
            }
            
        }
        else{
            $shops = DB::table('tbl_shop')
                        ->orderBy('id', 'desc')
                        ->get();
        }
        
        if($shops){
            return response()->json([
                "status" => true,
                "data" => $shops,
                "message" => "List of all the shop."
            ], 200);
        }
        else{
            return response()->json([
                "status" => false,
                "message" => "Failed to retrive all the shops"
            ], 404);
        }

    }

    public function add(Request $request){

        $request->validate([
            'name' => 'required|min:3|max:200'
        ]);

        $ins_data = [
            'unique_id'     => rand(11111111, 99999999),
            'name'          => $request->input('name'),
            'address'       => $request->input('address'),
            'country'       => $request->input('country'),
            'state'         => $request->input('state'),
            'city'          => $request->input('city'),
            'pincode'       => $request->input('pincode'),
            'status'        => '1',
            'created_by'    => '11'
        ];

        $shop_id = DB::table('tbl_shop')->insertGetId($ins_data);
        if($shop_id){
            return response()->json([
                "status" => true,
                "data" => $shop_id,
                "message" => "Shop added successfully."
            ], 200);

        }
        else{
            return response()->json([
                "status" => false,
                "message" => "Failed to add a shop."
            ], 404);

        }

    }



    public function update(Request $request){

        $mytime = Carbon::now();

        $upd_data = [
            'name' => $request->input('name'),
            // 'updated_at' => $mytime->toDateTimeString()
            'status' => 1
        ];

        $users = DB::table('tbl_salesman')
        ->where('id', $request->input('id'))
        ->update($upd_data);

        if($users){
            return response()->json([
                "status" => true,
                "message" => "Data updated successfully."
            ], 200);
        }
        else{
            return response()->json([
                "status" => false,
                "message" => "Failed to update the roles."
            ], 500);
        }

    }


    // To get all the roles list
    public function delete($id = null){

        if($id){
            $roles = DB::table('tbl_salesman')->where('id', $id)->delete();
        }
        else{
            $roles = DB::table('tbl_salesman')->delete();
        }

        if($roles){
            return response()->json([
                "status" => true,
                "message" => "Data deleted successfully."
            ], 200);
        }
        else{
            return response()->json([
                "status" => false,
                "message" => "Failed to delete the data."
            ], 500);
        }


    }

    // To empty a table
    public function empty(){
        $res = DB::table('tbl_salesman')->truncate();
        if($res){
            return response()->json([
                "status" => true,
                // "fff" => $res,
                "message" => "Table was cleared successfully."
            ], 200);
        }
        else{
            return response()->json([
                "status" => false,
                // "fff" => $res,
                "message" => "Failed to empty table."
            ], 500);
        }
    }
    
    public function shop_visit($id){

        $shop = DB::table('tbl_shop')
                    ->where('id', $id)
                    ->get();

        if($shop){
            $affected = DB::table('tbl_shop')
                  ->where('id', $id)
                  ->update(['no_of_visits' => ($shop[0]->no_of_visits + 1)]);

            if($affected){
                return response()->json([
                    "status" => true,
                    "message" => "visited."
                ], 200);
            }
            
        }

    }
    
    public function get_shop_details(Request $request){

        $request->validate([
            'id' => 'required',
            'salesman_id' => 'required'
        ]);

        $order_id = "NB".$request->input('salesman_id').time();

        $get_shop_details = DB::table('tbl_shop')
                // ->where('id', '14')
                ->where('id', $request->input('id'))
                ->get();
                
        if($get_shop_details){
            return response()->json([
                    "status"=>true,
                    "data"=>$get_shop_details,
                    "order_id"=>$order_id,
                    "message"=>"Shop details loaded successfully."
                ], 200);
        }
        else{
            return response()->json([
                    "status" => false,
                    "message" => "Failed to retrieve data."
                ], 400);
        }
    }
    
    public function get_shop_details_old(Request $request){

        $request->validate([
            'id' => 'required',
            'salesman_id' => 'required'
        ]);

        $order_id = "NB".$request->input('salesman_id').time();

        $get_shop_details = DB::table('tbl_shop')
                // ->where('id', '14')
                ->where('id', $request->input('id'))
                ->get();
                
        if($get_shop_details){
            return response()->json([
                    "status"=>true,
                    "data"=>$get_shop_details,
                    "order_id"=>$order_id,
                    "message"=>"Shop details loaded successfully."
                ], 200);
        }
        else{
            return response()->json([
                    "status" => false,
                    "message" => "Failed to retrieve data."
                ], 400);
        }
    }
    
    
    public function test_add(Request $request){

        $req_data = (object) $request->json()->all();

        $data['username'] = $req_data->username;
        $data['password'] = $req_data->password;

        // $request->validate([
        //     $data['username'] => 'required|min:3|max:50',
        //     $data['password'] => 'required|min:6|max:20'
        // ]);

        
        // $res = DB::table('tbl_salesman')->where('username', $data['username'])->first();
        
        return response()->json([
                "data"=>$request->json()->all(),
                "result"=>$data
                // "username"=>$request->json()->input('username'),
                // "password"=>$request->json()->input('password'),
            ], 200);
            
    }
    
}