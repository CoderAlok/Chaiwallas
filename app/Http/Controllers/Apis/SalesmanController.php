<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class SalesmanController extends Controller
{
    // To get all the roles list
    public function list($id = null){

        if($id){
            $roles = DB::table('tbl_salesman')->where('id', $id)->first();
        }
        else{
            $roles = DB::table('tbl_salesman')->get();
        }

        return response()->json([
            "status" => 1,
            "data" => $roles,
            "message" => "List of all the salesman."
        ], 200);

    }

    // Salesman login
    public function get(Request $request){

        $request->validate([
            'username' => 'required|min:3|max:50',
            'password' => 'required|min:6|max:20'
        ]);


        $res = DB::table('tbl_salesman')
                    ->where('username', $request->input('username'))
                    ->where('status', 1)
                    ->first();
        if($res){
            if(!Hash::check($request->input('password'),$res->password)){

                return response()->json([
                    "status" => false,
                    "message" => "Wrong password. Please, provide a correct password."
                ], 404);

            }
            else{

                // $res_1 = DB::table('tbl_salesman')
                //             ->select('tbl_salesman.*', DB::raw("(GROUP_CONCAT(tbl_salesman_allocation.pincode SEPARATOR ',')) as allocated_pincodes"))
                //             ->rightjoin('tbl_salesman_allocation', 'tbl_salesman_allocation.salesman_id', '=', 'tbl_salesman.id')
                //             ->groupBy('tbl_salesman_allocation.salesman_id')
                //             ->where('username', $request->input('username'))
                //             ->get();


                $res2 = DB::table('tbl_salesman_allocation')
                            ->select(DB::raw("(GROUP_CONCAT(tbl_salesman_allocation.pincode SEPARATOR ',')) as allocated_pincodes"))
                            ->where('tbl_salesman_allocation.salesman_id', $res->id)
                            ->get();

                return response()->json([
                    "status" => true,
                    "data" => $res,
                    "allocated_pincode" => $res2,
                    "message" => "Logged in successfully."
                ], 200);
            }

        }
        else{

            $res = DB::table('tbl_user')->where('username', $request->input('username'))->first();
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
            // return response()->json([
            //     "status" => false,
            //     "message" => "Wrong username! Please, provide a correct username."
            // ], 404);
        }

    }


    // Teamleads List
    public function get_teamleads(){

        $res = DB::table('tbl_salesman')->where('user_role', '1')->get();
        if($res){

            $res_1 = DB::table('tbl_salesman')
                        ->join('tbl_salesman_allocation', 'tbl_salesman_allocation.salesman_id', '=', 'tbl_salesman.id')
                        ->select('*', 'tbl_salesman_allocation.id', 'tbl_salesman_allocation.pincode AS allocated_pincode')
                        ->get();

            return response()->json([
                "status" => 1,
                "data" => $res_1,
                "message" => "Teamleads loaded successfully."
            ], 200);

        }
        else{
            return response()->json([
                "status" => 1,
                "message" => "Wrong username! Please, provide a correct username."
            ], 500);
        }

    }



    // Salesmans list
    public function get_salesmans(){

        $res = DB::table('tbl_salesman')->where('user_role', '2')->get();
        if($res){

            $res_1 = DB::table('tbl_salesman')
                        ->join('tbl_salesman_allocation', 'tbl_salesman_allocation.salesman_id', '=', 'tbl_salesman.id')
                        ->select('*', 'tbl_salesman_allocation.id', 'tbl_salesman_allocation.pincode AS allocated_pincode')
                        ->get();

            return response()->json([
                "status" => 1,
                "data" => $res_1,
                "message" => "Salesman loaded successfully."
            ], 200);

        }
        else{
            return response()->json([
                "status" => 1,
                "message" => "Wrong username! Please, provide a correct username."
            ], 500);
        }

    }
    // Salesmans list
    public function teamleads_get_salesman($id = null){

        $res = DB::table('tbl_salesman')->where('id', $id)->get();
        if($res){

            // $res_1 = DB::table('tbl_salesman')
            //             ->join('tbl_salesman_allocation', 'tbl_salesman_allocation.salesman_id', '=', 'tbl_salesman.id')
            //             ->select('*', 'tbl_salesman_allocation.id', 'tbl_salesman_allocation.pincode AS allocated_pincode')
            //             ->get();

            $res_2 = DB::table('tbl_salesman')
                            ->where('reporting_to', $res[0]->reporting_to)
                            ->get();

            return response()->json([
                "status" => true,
                // "data" => $res_1,
                "data" => $res_2,
                // "data1" => $res[0]->reporting_to,
                "message" => "Sddddalesman loaded successfully."
            ], 200);

        }
        else{
            return response()->json([
                "status" => false,
                "message" => "Wrong username! Please, provide a correct username."
            ], 404);
        }

    }


    // Create Salesman
    public function add(Request $request){

        $request->validate([
            'name' => 'required|min:3|max:50'
        ]);

        $ins_data = [
            'user_role'     => ($request->input('user_role')==''?'':$request->input('user_role')),
            'reporting_to'  => $request->input('reporting_to'),
            'name'          => $request->input('name'),
            'username'      => $request->input('name').rand(11111, 99999),
            'password'      => Hash::make($request->input('password')),
            'email'         => ($request->input('email') == ''?'':$request->input('email')),
            'phone'         => ($request->input('phone') == ''?'':$request->input('phone')),
            'address'       => $request->input('address'),
            'country'       => $request->input('country'),
            'state'         => $request->input('state'),
            'city'          => $request->input('city'),
            'locality'      => $request->input('locality'),
            'pincode'       => $request->input('pincode'),
            'status'        => '1',
            'created_by'    => '1'
        ];

        return response()->json([
                "data" => $ins_data
            ], 200);
        exit();

        $users_id = DB::table('tbl_salesman')->insertGetId($ins_data);
        if($users_id){
            return response()->json([
                "status" => 1,
                "data" => $users_id,
                "message" => "Salesman inserted successfully."
            ], 200);

        }
        else{
            return response()->json([
                "status" => 0,
                "message" => "Failed to insert a salesman."
            ], 500);

        }

    }


    // Update Salesman
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
                "status" => 1,
                "message" => "Data updated successfully."
            ], 200);
        }
        else{
            return response()->json([
                "status" => 0,
                "message" => "Failed to update the roles."
            ], 500);
        }

    }


    // Delete all / One
    public function delete($id = null){

        if($id){
            $roles = DB::table('tbl_salesman')->where('id', $id)->delete();
        }
        else{
            $roles = DB::table('tbl_salesman')->delete();
        }

        if($roles){
            return response()->json([
                "status" => 1,
                "message" => "Data deleted successfully."
            ], 200);
        }
        else{
            return response()->json([
                "status" => 0,
                "message" => "Failed to delete the data."
            ], 500);
        }


    }

    // Empty Table
    public function empty(){
        $res = DB::table('tbl_salesman')->truncate();
        if($res){
            return response()->json([
                "status" => 1,
                // "fff" => $res,
                "message" => "Table was cleared successfully."
            ], 200);
        }
        else{
            return response()->json([
                "status" => 0,
                // "fff" => $res,
                "message" => "Failed to empty table."
            ], 500);
        }
    }

}
