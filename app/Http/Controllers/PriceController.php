<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PriceController extends Controller
{

    public function index(Request $request){

        if($request->session()->get('email') != null){
            if(session('email') == ""){
                return redirect('/');
            }
            else{
                $prices = DB::table('tbl_price')
                            ->leftjoin('tbl_products', 'tbl_price.product_id', '=', 'tbl_products.id')
                            ->select('tbl_price.id', 'tbl_products.name', 'tbl_price.price', 'tbl_products.status')
                            ->orderByDesc('tbl_price.id')
                            ->get();

                return view('pages.prices.list', ['prices'=>$prices]);
            }

        }
        else{
            return redirect('/');
        }

    }

    public function add_price(){

        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $products = DB::table('tbl_products')
                            // ->leftjoin('tbl_price', 'tbl_products.id', '=', 'tbl_price.product_id')
                            // ->select('tbl_products.id', 'tbl_products.name', 'tbl_products.quantity', 'tbl_products.unit')
                            ->get();

            // echo '<pre>';
            // print_r($products);
            // exit();
            return view('pages.prices.add', ['products' => $products]);
        }

    }


    public function add_price_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{

            $request->validate([
                    'product_id' => 'required',
                    'price'      => 'required'
                ]);

            // Checks the product exists or not
            $chk_price = DB::table('tbl_price')
                            ->where('product_id', $request->input('product_id'))
                            ->get();

            if($chk_price){
                $ins_data = [
                    'product_id'=>$request->input('product_id'),
                    'price'=>$request->input('price'),
                    'status'=>1,
                    'created_by'=>1,
                ];

                $users = DB::table('tbl_price')->insertGetId($ins_data);
                if($users){
                    return redirect()->to('/dashboard/prices/list')->withErrors([
                        'error_msg' => 'Price added successfully.',
                    ]);
                }
            }
            else{
                return redirect()->to('/dashboard/prices/add')->withErrors([
                        'error_msg' => 'Product already exists.',
                    ]);
            }
        }
    }

    public function update_price(Request $request, $id){
        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            $products = DB::table('tbl_products')->get();
            $user_data = DB::table('tbl_products')->where('id', $id)->first();

            // echo '<pre>';
            // print_r($user_data);
            // exit();

            return view('pages.prices.update', ['user_data'=>$user_data, 'products' => $products]);
        }

    }

    public function update_price_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            // return $request->all();
            $mytime = Carbon::now();

            $upd_data = [
                'name'=>$request->input('name'),
                'unit'=>$request->input('unit'),
                'quantity'=>$request->input('quantity'),
            ];

            $users = DB::table('tbl_price')
            ->where('id', $request->input('id'))
            ->update($upd_data);

            if($users){
                return redirect()->to('/dashboard/products/list')->withErrors([
                    'error_msg' => 'Products updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update the product.',
                ]);
            }
        }

    }

    public function delete_price($id){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $template = DB::table('tbl_price')->where('id', $id)->delete();
            if($template){
                return redirect()->to('/dashboard/prices/list')->withErrors([
                    'error_msg' => 'Price deleted successfully.',
                ]);
            }
            else{
                return redirect()->back();
            }
        }

    }

    public function status_change($id, $op){

        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $price = DB::table('tbl_price')
                    ->where('id', $id)
                    ->update([
                        'status' => $op
                    ]);
            if($price){
                return redirect()->to('/dashboard/prices/list')->withErrors([
                    'error_msg' => 'Price status updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update price status.',
                ]);
            }
        }

    }

}
