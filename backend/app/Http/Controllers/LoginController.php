<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function view(){
        return view('noauth/login');
    }

    public function signin(Request $request){
        echo $request->input("email");
        //return redirect('blogger/list');
    }
}
