<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function index(Request $request){

        if($request->session()->get('email') != null){
            return view('pages.dashboard');
        }
        else{
            return redirect('/');
        }

    }

}
