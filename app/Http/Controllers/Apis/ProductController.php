<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // Product List
    public function list($id = null){

        if($id){
            $product = DB::table('tbl_products')
                            ->join('tbl_price', 'tbl_products.id', '=','tbl_price.product_id')
                            ->select('tbl_products.id', 'tbl_products.name', 'tbl_products.unit', 'tbl_products.quantity', 'tbl_products.created_at', 'tbl_products.created_by', 'tbl_products.status', 'tbl_price.price')
                            ->where('id', $id)
                            ->first();
        }
        else{
            $product = DB::table('tbl_products')
                            ->join('tbl_price', 'tbl_products.id', '=','tbl_price.product_id')
                            ->select('tbl_products.id', (DB::raw('CONCAT(tbl_products.name, " ", tbl_products.quantity, " ", tbl_products.unit) AS name')), 'tbl_products.unit', 'tbl_products.quantity', 'tbl_products.created_at', 'tbl_products.created_by', 'tbl_products.status', 'tbl_price.price')
                            ->get();
        }

        return response()->json([
            "status" => true,
            "data" => $product,
            "message" => "List of all the products."
        ], 200);

    }

}
