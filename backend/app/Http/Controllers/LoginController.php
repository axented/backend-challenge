<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function view(){
        return view('noauth/login');
    }

    public function signin(Request $request){
        $email=$request->input("email");        
        $idUser=  User::  select('id')->where('email',$email)->pluck('id');

        if( count($idUser) > 0 ){
            Auth::loginUsingId($idUser[0]);
            return redirect('blogger/list');
        }else{
            redirect('logueo/view');
        }

    }
}
