<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class RolesController extends Controller
{

    public function index(){

        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $roles = DB::table('tbl_user_role')
                                ->select('id', 'name', 'status')
                                ->orderByDesc('tbl_user_role.id')
                                ->get();
            return view('pages.roles.list', ['roles'=>$roles]);
        }

    }

    public function add_roles(Request $r){

        if($r->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            return view('pages.roles.add');
        }

    }

    public function add_roles_data(Request $request){

        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{

            $request->validate([
                'name' => 'required|max:50'
            ]);

            $chk = DB::table('tbl_user_role')
                            ->where('name', $request->input('name'))
                            ->get()
                            ->count();
                            // exit('sas : '.$chk);

            if(!$chk){
                $ins_data = [
                    'name'=>$request->input('name'),
                    'status'=>'1'
                ];

                $users = DB::table('tbl_user_role')->insertGetId($ins_data);
                if($users){
                    return redirect()->to('/dashboard/roles/list')->withErrors([
                        'error_msg' => 'Roles added successfully.',
                    ]);
                }
                else{
                    return redirect()->to('/dashboard/roles/add')->withErrors([
                        'status' => 'danger',
                        'error_msg' => 'Failed to add role.',
                    ]);
                }
            }
            else{
                return redirect()->to('/dashboard/roles/add')->withErrors([
                    'status' => 'danger',
                    'error_msg' => 'Role already exists.',
                ]);
            }

        }

    }

    public function update_roles(Request $request, $id){
        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{
            $roles = DB::table('tbl_user_role')
                                ->where('id', $id)
                                ->first();

            return view('pages.roles.update', ['roles'=>$roles]);
        }

    }

    public function update_roles_data(Request $request){
        if($request->session()->get('email') == ""){
            return redirect('/');
        }
        else{

            $chk = DB::table('tbl_user_role')
                            ->where('name', $request->input('name'))
                            ->get()
                            ->count();
                            // exit('sas : '.$chk);

            if(!$chk){
                $mytime = Carbon::now();

                $upd_data = [
                    'name' => $request->input('name'),
                    // 'updated_at' => $mytime->toDateTimeString(),
                    'status' => 1
                ];

                $users = DB::table('tbl_user_role')
                                ->where('id', $request->input('id'))
                                ->update($upd_data);

                // exit('m here');

                if($users){
                    return redirect()->to('/dashboard/roles/list')->withErrors([
                        'error_msg' => 'Roles updated successfully.',
                    ]);
                }
                else{
                    return redirect()->back()->withErrors([
                        'error_msg' => 'Failed to update roles.',
                    ]);
                }

            }
            else{
                return redirect()->back()->withErrors([
                    'status' => 'danger',
                    'error_msg' => 'Role already exists you cant update this role again.',
                ]);
            }

        }

    }

    public function delete_roles($id){

        if(session('email') == ""){
            return redirect('/');
        }
        else{
            $template = DB::table('tbl_user_role')->where('id', $id)->delete();
            if($template){
                return redirect()->to('/dashboard/roles/list')->withErrors([
                    'error_msg' => 'Roles deleted successfully.',
                ]);
            }
            else{
                return redirect()->back();
            }
        }

    }

    public function status_change($id, $op){

        if(session('email') == ''){
            return redirect('/');
        }
        else{
            $users = DB::table('tbl_user_role')
            ->where('id', $id)
            ->update([
                'status' => $op
            ]);

            if($users){
                return redirect()->to('/dashboard/roles/list')->withErrors([
                    'error_msg' => 'Roles status updated successfully.',
                ]);
            }
            else{
                return redirect()->back()->withErrors([
                    'error_msg' => 'Failed to update role status.',
                ]);
            }

        }

    }

}
