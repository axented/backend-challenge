<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*Models------------------*/
use App\Models\User;

class LoginController extends Controller{

    public function signin( Request $request ){
        $validatedData = $request->validate([
            'email' => ' required | email |min:5'
        ]);

        $email  =$request->input("email");
        $idUser =  User::  select( 'id' )->where( 'email',$email )->pluck( 'id' );

        if( count($idUser) > 0 ){
            return json_encode(array(
                    'status'        => 200,
                    'response'      => array(
                        'Mensaje'   => 'ok')));
        }else{
            return json_encode(array(
                    'status'        => 400,
                    'response'      => array(
                        'Mensaje'   => 'Error')));
        }
    }

    public function signout( Request $request ){
        $validatedData = $request->validate([
            'email' => ' required | email |min:5'
        ]);

        $email  =$request->input("email");
        $idUser =  User::  select('id')->where('email',$email)->pluck('id');

        if( count( $idUser ) > 0 ){
            return json_encode(array(
                    'status'        => 200,
                    'response'      => array(
                        'Mensaje'   => 'ok')));
        }else{
            return json_encode(array(
                    'status'        => 400,
                    'response'      => array(
                        'Mensaje'   => 'Error')));
        }
    }
}
