<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SalesmanAllocationController extends Controller
{

    public function index(){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $salesman_allo = DB::table('tbl_salesman_allocation')
                        ->leftJoin('tbl_salesman', 'tbl_salesman_allocation.salesman_id', '=', 'tbl_salesman.id')
                        ->select('tbl_salesman_allocation.id', 'tbl_salesman.name as salesman_id', 'tbl_salesman_allocation.pincode', 'tbl_salesman_allocation.status')
                        ->orderByDesc('tbl_salesman_allocation.id')
                        ->get();

            return view('pages.salesman_allocation.list', ['salesman_allo'=>$salesman_allo]);
        }

    }

    public function add(){

        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $salesman = DB::table('tbl_salesman')
                            ->select('id', 'name')
                            ->where('status', '1')
                            ->get();
            return view('pages.salesman_allocation.add', ['salesman'=>$salesman]);
        }

    }


    public function add_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{

            $request->validate([
                    'salesman_id'   => 'required',
                    'pincode'       => 'required'
                ]);

            // Checks the product exists or not
            $chk = DB::table('tbl_salesman_allocation')
                            ->where('salesman_id', $request->input('salesman_id'))
                            ->where('pincode', $request->input('pincode'))
                            ->get()
                            ->count();

            if(!$chk){
                $ins_data = [
                    'salesman_id'=>$request->input('salesman_id'),
                    'pincode'=>$request->input('pincode'),
                    'status'=>1,
                    'created_by'=>1,
                ];

                $users = DB::table('tbl_salesman_allocation')->insertGetId($ins_data);
                if($users){
                    return redirect()->to('/dashboard/salesman-allocation/list')->withErrors([
                        'status' => 'success',
                        'error_msg' => 'Salesman allocation added successfully.',
                    ]);
                }
            }
            else{
                return redirect()->to('/dashboard/salesman-allocation/add')->withErrors([
                        'status' => "danger",
                        'error_msg' => 'Salesman already allocatied to this pincode.',
                    ]);
            }
        }
    }

    public function update(Request $request, $id){
        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            $salesman = DB::table('tbl_salesman')
                            ->select('id', 'name')
                            ->where('status', '1')
                            ->get();
            $allocs = DB::table('tbl_salesman_allocation')
                            ->where('id', $id)
                            ->get();
            return view('pages.salesman_allocation.update', ['salesman'=>$salesman, 'user_data'=>$allocs]);
        }

    }

    public function update_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{

            // Checks the product exists or not
            $chk = DB::table('tbl_salesman_allocation')
                            ->where('salesman_id', $request->input('salesman_id'))
                            ->where('pincode', $request->input('pincode'))
                            ->get()
                            ->count();
            if(!$chk){
                // return $request->all();
                $mytime = Carbon::now();

                $upd_data = [
                    'salesman_id'=>$request->input('salesman_id'),
                    'pincode'=>$request->input('pincode')
                ];

                $users = DB::table('tbl_salesman_allocation')
                        ->where('id', $request->input('id'))
                        ->update($upd_data);

                if($users){
                    return redirect()->to('/dashboard/salesman-allocation/list')->withErrors([
                        'status' => "",
                        'error_msg' => 'Salesman allocation updated successfully.',
                    ]);
                }
                else{
                    return redirect()->back()->withErrors([
                        'status' => "danger",
                        'error_msg' => 'Failed to update the salesman allocation.',
                    ]);
                }
            }
            else{
                return redirect()->back()->withErrors([
                    'status' => 'danger',
                    'error_msg' => 'Salesman has been already allocated to this pincode.',
                ]);
            }

        }

    }

    public function delete($id){
        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $template = DB::table('tbl_salesman_allocation')->where('id', $id)->delete();
            if($template){
                return redirect()->to('/dashboard/salesman-allocation/list')->withErrors([
                    'error_msg' => 'Salesman allocation deleted successfully.',
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
            $users = DB::table('tbl_salesman_allocation')
            ->where('id', $id)
            ->update([
                'status' => $op
            ]);

            if($users){
                return redirect()->to('/dashboard/salesman-allocation/list')->withErrors([
                    'error_msg' => 'Salesman allocation status updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update salesman allocation status.',
                ]);
            }
        }

    }

}
