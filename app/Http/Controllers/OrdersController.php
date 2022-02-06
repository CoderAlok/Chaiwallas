<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrdersController extends Controller
{

    public function index(){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $orders = DB::table('tbl_order')
                        ->leftJoin('tbl_shop', 'tbl_order.ordered_by', '=', 'tbl_shop.id')
                        ->leftJoin('tbl_salesman', 'tbl_order.sold_by', '=', 'tbl_salesman.id')
                        ->select('tbl_order.*', 'tbl_shop.name as ordered_by', 'tbl_salesman.name AS sold_by')
                        ->orderByDesc('tbl_order.id')
                        ->get();

                // echo '<pre>';
                // print_r($orders);
                // exit();

            return view('pages.orders.list', ['orders'=>$orders]);
        }

    }

    public function view($id){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $orders = DB::table('tbl_order_details')
                        ->leftJoin('tbl_order', 'tbl_order.id', '=', 'tbl_order_details.id')
                        ->leftJoin('tbl_products', 'tbl_order_details.product_id', '=', 'tbl_products.id')
                        ->leftJoin('tbl_price', 'tbl_order_details.product_id', '=', 'tbl_price.product_id')
                        ->select(
                                    'tbl_order_details.id',
                                    'tbl_order.order_id as unique_order_id',
                                    'tbl_products.name as product_id',
                                    'tbl_order_details.quantity as quantity',
                                    'tbl_order_details.unit as unit',
                                    'tbl_price.price as unit_price_id',
                                    'tbl_order_details.total_price as total_price',
                                    'tbl_order_details.notes as notes'
                                )
                        ->where('tbl_order_details.order_id', $id)
                        ->orderBy('id', 'desc')
                        ->get();
            $order_id = DB::table('tbl_order')->select('order_id')->where('id', $id)->get();

            $shop_dets = DB::table('tbl_order')
                        ->leftJoin('tbl_shop', 'tbl_shop.id', '=', 'tbl_order.ordered_by')
                        ->select('tbl_shop.name', 'tbl_shop.address')
                        ->where('tbl_order.id', $id)
                        ->get();

            return view('pages.orders.view', ['orders'=>$orders, 'order_id'=>$order_id, 'shop_dets'=>$shop_dets]);
        }

    }

}
