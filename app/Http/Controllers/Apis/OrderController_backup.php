<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    
    public function create(Request $request){
        $request->validate([
            'shop_id'           => 'required',
            'order_date'        => 'required',
            'amount_collected'  => 'required',
            'ord_prod_dets'     => 'required'
        ]);
        
        $order_amount = 0;
        $total_cost = 0;
        $status = false;
        
        $ins_order = [
                    "order_id" => $request->input('order_id'),
                    "total_price" => 0,  
                    "advance_payment" => 0,  
                    "payment_recieved" => 0,  
                    "payment_due" => 0,  
                    "ordered_by" => $request->input('shop_id'),  
                    "order_date" => date('Y-m-d H:i:s', strtotime($request->input('order_date'))),
                    "sold_by" => $request->input('salesman_id'), 
                    // "notes"         => $request->input('notes'),  // need to add in database
                    "created_by" => $request->input('salesman_id'),
                    "status" => 1
                ];

        $order = DB::table('tbl_order')->insertGetId($ins_order);
        if($order){
            $ord_prod_dets = json_decode($request->input('ord_prod_dets'), true);
            
            foreach($ord_prod_dets as $key => $value){

                $order_amount = $order_amount + $value['amount'];
                
                $product_det[$key] = DB::table('tbl_products')
                                    ->join('tbl_price', 'tbl_products.id', '=', 'tbl_price.product_id')
                                    ->select('tbl_products.*', 'tbl_price.id as price_id', 'tbl_price.price as price')
                                    ->where('tbl_products.id', $value['product_id'])
                                    ->get();
                                    
                
                $ins_order_details[$key] = [
                        "order_id"      => $order,
                        "product_id"    => $value['product_id'],
                        "quantity"      => $value['qnty'],
                        "unit"          => $product_det[$key][0]->unit,
                        "unit_price_id" => $product_det[$key][0]->price_id,
                        "total_price"   => $value['amount'],
                        "notes"         => '',//$request->input('notes'),
                        "status"        => 1,
                        "created_by"    => $request->input('salesman_id')
                    ];
                    
                $order_details[$key] = DB::table('tbl_order_details')->insertGetId($ins_order_details[$key]);
                if($order_details[$key]){
                    $status = true;
                }
                else{
                    $status = false;
                }
    
            }
            

        }
        else{
            return response()->json([
                    "status"=>false,
                    "message"=>"failed to book order."
                ], false);
        }
        
        

        if($status){
            
            $upd_tbl_order_data = [
                    'total_price' => $order_amount,
                    'advance_payment' => $request->input('amount_collected'),
                    'payment_recieved' => $request->input('amount_collected'),
                    'payment_due' => ($order_amount - $request->input('amount_collected'))
                ];
            
            $upd_tbl_order = DB::table('tbl_order')
                                ->where('id', $order)
                                ->update($upd_tbl_order_data);
                                
            if($upd_tbl_order){
                return response()->json([
                    "status" => true,
                    "order_amount" => $order_amount,
                    "total_cost" => ($order_amount - $request->input('amount_collected')),
                    "message" => "Order booked."
                ], 200);
            }
            else{
                return response()->json([
                    "status" => false,
                    "message" => "Order not updated."
                ], 200);
            }

        }
        else{
            return response()->json([
                "status"=>false,
                "message"=>"Failde"
            ], 400);
        }
        
    }
    
    
    //Order list
    public function list(Request $request){
        
        $shop = DB::table('tbl_shop')
                    ->leftjoin('tbl_order', 'tbl_order.ordered_by', '=', 'tbl_shop.id')
                    ->select('tbl_shop.*', 'tbl_order.order_id', 'tbl_order.total_price', 'tbl_order.payment_recieved', 'tbl_order.payment_due')
                    ->where('tbl_shop.id', $request->input('shop_id'))
                    ->get();

        return response()->json([
                "status"=>"true",
                "data" => $shop
            ], 200);
    }

}






