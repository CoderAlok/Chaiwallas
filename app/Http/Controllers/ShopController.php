<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShopController extends Controller
{

    public function index(){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $shops = DB::table('tbl_shop')
                        ->leftJoin('tbl_country', 'tbl_shop.country', '=', 'tbl_country.id')
                        ->leftJoin('tbl_state', 'tbl_shop.state', '=', 'tbl_state.id')
                        ->leftJoin('tbl_city', 'tbl_shop.city', '=', 'tbl_city.id')
                        ->select(
                                'tbl_shop.id',
                                'tbl_shop.name',
                                'tbl_shop.address',
                                'tbl_country.name as country',
                                'tbl_state.name as state',
                                'tbl_city.name as city',
                                'tbl_shop.pincode',
                                'tbl_shop.no_of_visits',
                                'tbl_shop.status'
                            )
                        ->get();

            return view('pages.shops.list', ['shops'=>$shops]);
        }

    }

    public function add_shop(){

        if(session('email') == ""){
            return redirect('/');
        }
        else{

            $country = DB::table('tbl_country')
                            ->where('status', '1')
                            ->get();

            $state = DB::table('tbl_state')
                            ->where('status', '1')
                            ->get();

            $city = DB::table('tbl_city')
                            ->where('status', '1')
                            ->get();

            return view('pages.shops.add', ['country'=>$country, 'state'=>$state, 'city'=>$city]);
        }

    }


    public function add_shop_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            $request->validate([
                    'name'      => 'required',
                    'address'   => 'required',
                    'country'   => 'required',
                    'state'     => 'required',
                    'city'      => 'required',
                    'pincode'   => 'required'
                ]);

            // Checks the product exists or not
            // $chk_product = DB::table('tbl_shop')
            //                 ->where('name', 'like', '%'.$request->input('name').'%')
            //                 ->where('unit', $request->input('unit'))
            //                 ->where('quantity', $request->input('quantity'))
            //                 ->get();

            // if($chk_product){
                $ins_data = [
                    'unique_id'     => rand(11111111, 99999999),
                    'name'          => $request->input('name'),
                    'address'       => $request->input('address'),
                    'country'       => $request->input('country'),
                    'state'         => $request->input('state'),
                    'city'          => $request->input('city'),
                    'pincode'       => $request->input('pincode'),
                    'status'        => '1',
                    'created_by'    => '11'
                ];

                $shop_id = DB::table('tbl_shop')->insertGetId($ins_data);
                if($shop_id){
                    return redirect()->to('/dashboard/shop/list')->withErrors([
                        'error_msg' => 'Shops added successfully.',
                    ]);
                }
                else{
                    return redirect()->to('/dashboard/shop/add')->withErrors([
                        'error_msg' => 'Failed to add shop.',
                    ]);
                }
            // }
            // else{
            //     return redirect()->to('/dashboard/products/add')->withErrors([
            //             'error_msg' => 'Product already exists.',
            //         ]);
            // }
        }
    }

    public function update_shop(Request $request, $id){
        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            $country = DB::table('tbl_country')
                            ->where('status', '1')
                            ->get();

            $state = DB::table('tbl_state')
                            ->where('status', '1')
                            ->get();

            $city = DB::table('tbl_city')
                            ->where('status', '1')
                            ->get();

            $shop_data = DB::table('tbl_shop')->where('id', $id)->first();
            return view('pages.shops.update', ['shop_data'=>$shop_data, 'country'=>$country, 'state'=>$state, 'city'=>$city]);
        }

    }

    public function update_shop_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            $mytime = Carbon::now();

            $upd_data = [
                'unique_id'     => rand(11111111, 99999999),
                'name'          => $request->input('name'),
                'address'       => $request->input('address'),
                'country'       => $request->input('country'),
                'state'         => $request->input('state'),
                'city'          => $request->input('city'),
                'pincode'       => $request->input('pincode'),
                'status'        => '1',
                'updated_at'    => $mytime->toDateTimeString(),
                'updated_by'    => '11'
            ];

            // echo '<pre>';
            // print_r($request->all());
            // // print_r($upd_data);
            // exit();

            $users = DB::table('tbl_shop')
                    ->where('id', $request->input('id'))
                    ->update($upd_data);

            if($users){
                return redirect()->to('/dashboard/shop/list')->withErrors([
                    'error_msg' => 'Shop updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update the shop.',
                ]);
            }
        }

    }

    public function delete_shop($id){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $template = DB::table('tbl_shop')->where('id', $id)->delete();
            if($template){
                return redirect()->to('/dashboard/shop/list')->withErrors([
                    'error_msg' => 'Shop deleted successfully.',
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
            $users = DB::table('tbl_shop')
                    ->where('id', $id)
                    ->update([
                        'status' => $op
                    ]);

            if($users){
                return redirect()->to('/dashboard/shop/list')->withErrors([
                    'error_msg' => 'Shop status updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update shop status.',
                ]);
            }

        }

    }

}
