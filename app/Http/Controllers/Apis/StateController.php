<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    // To get all the roles list
    public function list($id = null){

        if($id){
            $state = DB::table('tbl_state')->where('id', $id)->first();
        }
        else{
            $state = DB::table('tbl_state')->get();
        }

        return response()->json([
            "status" => true,
            "data" => $state,
            "message" => "List of all the states."
        ], 200);

    }
    
}