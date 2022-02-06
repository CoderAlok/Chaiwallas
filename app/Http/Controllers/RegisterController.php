<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }

    public function register1(){
        echo 'Register here ...';
    }

    public function forgot_password(){
        echo 'Forgot password...';
    }


    public function forgot_password1(){
        echo 'Forgot password here ...';
    }

}
