<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    // To get all the city list
    public function list($id = null){

        if($id){
            $city = DB::table('tbl_city')->where('id', $id)->first();
        }
        else{
            $city = DB::table('tbl_city')->get();
        }

        return response()->json([
            "status" => true,
            "data" => $city,
            "message" => "List of all the cities."
        ], 200);

    }
    
}