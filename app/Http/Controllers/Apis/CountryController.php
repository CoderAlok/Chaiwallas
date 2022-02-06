<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    // To get all the country list
    public function list($id = null){

        if($id){
            $country = DB::table('tbl_country')->where('id', $id)->first();
        }
        else{
            $country = DB::table('tbl_country')->get();
        }

        return response()->json([
            "status" => true,
            "data" => $country,
            "message" => "List of all the countries."
        ], 200);

    }
    
}