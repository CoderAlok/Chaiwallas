<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // To get all the roles list
    public function list($id = null){

        if($id){
            $roles = DB::table('tbl_user_role')->where('id', $id)->first();
        }
        else{
            $roles = DB::table('tbl_user_role')->get();
        }

        return response()->json([
            "status" => true,
            "data" => $roles,
            "message" => "List of all the user roles."
        ], 200);

    }



    public function add(Request $request){

        $request->validate([
            'name' => 'required|max:10'
        ]);

        $ins_data = [
            'name'=>$request->input('name'),
            'status'=>1,
        ];

        $users_id = DB::table('tbl_user_role')->insertGetId($ins_data);
        if($users_id){
            return response()->json([
                "status" => true,
                "message" => "Roles inserted successfully."
            ], 200);

        }
        else{
            return response()->json([
                "status" => false,
                "message" => "Failed to insert a roles."
            ], 500);

        }

    }



    public function update(Request $request){

        $mytime = Carbon::now();

        $upd_data = [
            'name' => $request->input('name'),
            // 'updated_at' => $mytime->toDateTimeString()
            'status' => 1
        ];

        $users = DB::table('tbl_user_role')
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
            $roles = DB::table('tbl_user_role')->where('id', $id)->delete();
        }
        else{
            $roles = DB::table('tbl_user_role')->delete();
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
        $res = DB::table('tbl_user_role')->truncate();
        if(!$res){
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
    
}