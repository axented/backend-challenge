<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Models\User;
use App\Models\Friends;

class UserController extends Controller
{
    public function create()
    {
        return view('noauth/register');
    }
    public function store(Request $request){       
        $User= new User();
            $User->name=$request->input("name");
            $User->email=$request->input("email");
            $User->website=$request->input("website");
            $User->picture=$request->input("picture_url");
        $User->save();
        return redirect('/logueo/view');
    }
    public function list(){
        $dataBloggers=User::where('id', '!=' ,Auth::id())->get();        
        return view('auth.blogger.list', array("dataBloggers"=>$dataBloggers));
    }
}
