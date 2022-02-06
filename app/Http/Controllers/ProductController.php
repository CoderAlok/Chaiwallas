<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{

    public function index(){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $products = DB::table('tbl_products')
                        ->leftjoin('tbl_price', 'tbl_price.product_id', '=', 'tbl_products.id')
                        ->select('tbl_products.id', 'tbl_products.name', 'tbl_products.unit', 'tbl_products.quantity', 'tbl_price.price', 'tbl_products.status')
                        ->orderBy('id', 'desc')
                        ->get();

            return view('pages.products.list', ['products'=>$products]);
        }

    }

    public function add_products(){

        if(session('email') == ""){
            return redirect('/');
        }
        else{
            return view('pages.products.add');
        }

    }


    public function add_products_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{

            $request->validate([
                    'name'      => 'required',
                    'unit'      => 'required',
                    'quantity'  => 'required'
                ]);

            // Checks the product exists or not
            $chk_product = DB::table('tbl_products')
                            ->where('name', 'like', '%'.$request->input('name').'%')
                            ->where('unit', $request->input('unit'))
                            ->where('quantity', $request->input('quantity'))
                            ->get()
                            ->count();
                // echo '<pre>';
                // print_r($chk_product);
                // exit();

            if(!$chk_product){
                // echo 'Product doesnot exita';
                $ins_data = [
                    'name'=>$request->input('name'),
                    'unit'=>$request->input('unit'),
                    'quantity'=>$request->input('quantity'),
                    'status'=>1,
                    'created_by'=>1,
                ];

                $users = DB::table('tbl_products')->insertGetId($ins_data);
                if($users){
                    return redirect()->to('/dashboard/products/list')->withErrors([
                        'error_msg' => 'Products added successfully.',
                    ]);
                }
            }
            else{
                return redirect()->to('/dashboard/products/add')->withErrors([
                        'error_msg' => 'Product already exists.',
                    ]);
                // echo 'Product already exists.';
            }
        }
    }

    public function update_products(Request $request, $id){
        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            $user_data = DB::table('tbl_products')->where('id', $id)->first();

            // echo '<pre>';
            // print_r($user_data);
            // exit();

            return view('pages.products.update', ['user_data'=>$user_data]);
        }

    }

    public function update_products_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{

            $chk_product = DB::table('tbl_products')
                            ->where('name', 'like', '%'.$request->input('name').'%')
                            ->where('unit', $request->input('unit'))
                            ->where('quantity', $request->input('quantity'))
                            ->get()
                            ->count();
            if(!$chk_product){
                // return $request->all();
                $mytime = Carbon::now();

                $upd_data = [
                    'name'=>$request->input('name'),
                    'unit'=>$request->input('unit'),
                    'quantity'=>$request->input('quantity'),
                ];

                $users = DB::table('tbl_products')
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
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update the product.',
                ]);
            }

        }

    }

    public function delete_products($id){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $template = DB::table('tbl_products')->where('id', $id)->delete();
            if($template){
                return redirect()->to('/dashboard/products/list')->withErrors([
                    'error_msg' => 'Product deleted successfully.',
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
            $users = DB::table('tbl_products')
            ->where('id', $id)
            ->update([
                'status' => $op
            ]);

            if($users){
                return redirect()->to('/dashboard/products/list')->withErrors([
                    'error_msg' => 'Product status updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update product status.',
                ]);
            }
        }

    }

}
