<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function chk_login(Request $request){
        $res = DB::table('tbl_user')->where('email', $request->input('email'))->first();
        if(!Hash::check($request->input('password'),$res->password)){
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'error_msg' => 'Wrong password or this account not approved yet.',
            ]);
        }
        else{
            // Set session
            // $request->session()->put('first_name', $res->first_name);
            // $request->session()->put('last_name', $res->last_name);
            $request->session()->put('email', $res->email);
            // $request->session()->put('role', $res->role);

            return redirect()->route('dashboard');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('login');
    }

    public function get_all_users(){
        echo Hash::make('yourpassword');
    }








    public function test_db_function(){
        // SELECT * FROM tbl_user
        // $users = DB::table('tbl_user')->get();
        // $users = DB::table('mst_template_type')->get();
        $users = DB::table('tbl_template')->get();

        // SELECT * FROM tbl_user LIMIT 0,1
        // $users = DB::table('tbl_user')->where('email', 'amitkumar@mail.com')->first();

        // SELECT first_name FROM tbl_user where email LIKE "amitkumar@mail.com"
        // $users = DB::table('tbl_user')->where('email', 'amitkumar@mail.com')->pluck('first_name');

        // SELECT first_name, last_name FROM tbl_user.
        // $users = DB::table('tbl_user')->pluck('first_name', 'last_name');

        // $users = DB::table('roles')->lists('title');




        // SINGLE INSERT QUERY
        // $ins_data = [
        //     'name'=>'All',
        //     'status'=>'1'
        // ];
        // $users = DB::table('mst_template_type')->insert($ins_data);
        // $users = DB::table('mst_template_type')->insertGetId($ins_data);

        // MULTIPLE INSERT QUERY
        $ins_data = [
            [
                'type_id'=>2,
                'title'=>'Long Term Assistence',
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'word_limit'=>100,
                'icon'=>'la.jpg',
                'status'=>'1'
            ],
            [
                'type_id'=>3,
                'title'=>'Product Description',
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'word_limit'=>300,
                'icon'=>'pa.png',
                'status'=>'1'
            ],
            [
                'type_id'=>1,
                'title'=>'Blog post topic',
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'word_limit'=>500,
                'icon'=>'pp.jpg',
                'status'=>'1'
            ],
            [
                'type_id'=>2,
                'title'=>'AIDA Framework',
                'description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem ipsum dolor sit amet consectetur adipisicing elit.',
                'word_limit'=>60,
                'icon'=>'aop.png',
                'status'=>'1'
            ]
            // [
            //     'name'=>'Ecommerce',
            //     'status'=>'1'
            // ]
        ];
        // $users = DB::table('tbl_template')->insert($ins_data);




        // UPDATE CONTENT OF A TABLE
        // $users = DB::table('tbl_template')
        //     ->where('id', 6)
        //     ->update([
        //         'title' => 'Laravel',
        //         'description' => 'Some awesome facts about laravel',
        //         'status' => 0
        //     ]);


        // DELETE ALL CONTENTS OF A TABLE
        // $users = DB::table('mst_template_type')->delete();

        // DELETE A PERTICULAR ROW OF A TABLE
        // $users = DB::table('mst_template_type')->where('id', '1')->delete();

        // TRUNCATE TABLE
        // $users = DB::table('mst_template_type')->truncate();

        return $users;
    }
}
