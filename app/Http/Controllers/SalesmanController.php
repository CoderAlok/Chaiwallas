<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalesmanController extends Controller
{

    public function index(){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $salesman = DB::table('tbl_salesman')
                            ->orderByDesc('tbl_salesman.id')
                            ->get();
            return view('pages.salesman.list', ['salesman'=>$salesman]);
        }

    }

    public function add_salesman(){

        if(session('email') == ""){
            return redirect('/');
        }
        else{

            $roles = DB::table('tbl_user_role')
                        ->select('id', 'name')
                        ->where('status', '1')
                        ->get();

            $teamlead = DB::table('tbl_salesman')
                        ->select('id', 'name')
                        ->where('user_role', '1')
                        ->where('status', '1')
                        ->get();

            $country  = DB::table('tbl_country')
                        ->select('id', 'name')
                        ->where('status', '1')
                        ->get();

            $state    = DB::table('tbl_state')
                        ->select('id', 'name')
                        ->where('status', '1')
                        ->get();

            $city     = DB::table('tbl_city')
                        ->select('id', 'name')
                        ->where('status', '1')
                        ->get();


            return view('pages.salesman.add', [
                    'teamlead'=>$teamlead,
                    'country'=>$country,
                    'state'=>$state,
                    'city'=>$city,
                    'roles'=>$roles
                ]);
        }

    }


    public function add_salesman_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            $request->validate([
                    'user_role'     => 'required',
                    'name'          => 'required',
                    'reporting_to'  => 'required',
                    // 'username'      => 'required',
                    'password'      => 'required',
                    // 'email'         => 'required',
                    'phone'         => 'required',
                    'address'       => 'required',
                    'country'       => 'required',
                    'state'         => 'required',
                    'city'          => 'required',
                    'locality'      => 'required',
                    'pincode'       => 'required'
                ]);

            // Checks the product exists or not
            $chk_salesman = DB::table('tbl_salesman')
                            ->where('phone', $request->input('phone'))
                            ->get()
                            ->count();

                            // exit('check : '.$chk_salesman);

            if(!$chk_salesman){
                $ins_data = [
                    'user_role'     => $request->input('user_role'),
                    'reporting_to'  => $request->input('reporting_to'),
                    'name'          => $request->input('name'),
                    'username'      => substr($request->input('name'), 0, 4).rand(1111, 9999),
                    'password'      => Hash::make($request->input('password')),
                    'email'         => $request->input('email'),
                    'phone'         => $request->input('phone'),
                    'address'       => $request->input('address'),
                    'country'       => $request->input('country'),
                    'state'         => $request->input('state'),
                    'city'          => $request->input('city'),
                    'locality'      => $request->input('locality'),
                    'pincode'       => $request->input('pincode'),
                    'status'        => 1,
                    'created_by'    => 1
                ];

                $users = DB::table('tbl_salesman')->insertGetId($ins_data);
                if($users){
                    return redirect()->to('/dashboard/salesmans/list')->withErrors([
                        'status' => '',
                        'error_msg' => 'Salesman added successfully.',
                    ]);
                }
            }
            else{
                return redirect()->to('/dashboard/salesmans/add')->withErrors([
                        'status' => 'danger',
                        'error_msg' => 'Salesman already exists.',
                    ]);
            }
        }
    }

    public function update_salesman(Request $request, $id){
        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{

            $roles = DB::table('tbl_user_role')
                        ->select('id', 'name')
                        ->where('status', '1')
                        ->get();

            $teamlead = DB::table('tbl_salesman')
                        ->select('id', 'name')
                        ->where('user_role', '1')
                        ->where('status', '1')
                        ->get();

            $country  = DB::table('tbl_country')
                        ->select('id', 'name')
                        ->where('status', '1')
                        ->get();

            $state    = DB::table('tbl_state')
                        ->select('id', 'name')
                        ->where('status', '1')
                        ->get();

            $city     = DB::table('tbl_city')
                        ->select('id', 'name')
                        ->where('status', '1')
                        ->get();

            $user_data = DB::table('tbl_salesman')
                        ->where('id', $id)
                        ->first();

            return view('pages.salesman.update', [
                    'teamlead'=>$teamlead,
                    'country'=>$country,
                    'state'=>$state,
                    'city'=>$city,
                    'roles'=>$roles,
                    'user_data'=>$user_data
                ]);

            // echo '<pre>';
            // print_r($user_data);
            // exit();

            // return view('pages.salesman.update', ['user_data'=>$user_data]);
        }

    }

    public function update_salesman_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            // return $request->all();
            $mytime = Carbon::now();

            $request->validate([
                'user_role'     => 'required',
                'name'          => 'required',
                'reporting_to'  => 'required',
                // 'username'      => 'required',
                'password'      => 'required',
                // 'email'         => 'required',
                'phone'         => 'required',
                'address'       => 'required',
                'country'       => 'required',
                'state'         => 'required',
                'city'          => 'required',
                'locality'      => 'required',
                'pincode'       => 'required'
            ]);

            $upd_data = [
                'user_role'     => $request->input('user_role'),
                'reporting_to'  => $request->input('reporting_to'),
                'name'          => $request->input('name'),
                'username'      => $request->input('username'),
                'password'      => $request->input('password'),
                'email'         => $request->input('email'),
                'phone'         => $request->input('phone'),
                'address'       => $request->input('address'),
                'country'       => $request->input('country'),
                'state'         => $request->input('state'),
                'city'          => $request->input('city'),
                'locality'      => $request->input('locality'),
                'pincode'       => $request->input('pincode'),
                'status'        => 1,
                'updated_at'    => $mytime->toDateTimeString(),
                'updated_by'    => 1
            ];

            $users = DB::table('tbl_salesman')
                        ->where('id', $request->input('id'))
                        ->update($upd_data);

            if($users){
                return redirect()->to('/dashboard/salesmans/list')->withErrors([
                    'error_msg' => 'Salesman updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update the salesman.',
                ]);
            }
        }

    }

    public function delete_salesman($id){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $template = DB::table('tbl_salesman')->where('id', $id)->delete();
            if($template){
                return redirect()->to('/dashboard/salesmans/list')->withErrors([
                    'error_msg' => 'Salesman deleted successfully.',
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
            $users = DB::table('tbl_salesman')
            ->where('id', $id)
            ->update([
                'status' => $op
            ]);

            if($users){
                return redirect()->to('/dashboard/salesmans/list')->withErrors([
                    'error_msg' => 'Salesman status updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update salesman status.',
                ]);
            }
        }

    }

}
