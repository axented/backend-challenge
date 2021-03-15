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
    public function profile($id){
        $dataUser=User::find($id);
        $dataFriend=Friends::select('id_friend')->where('id_blogger',$id)->get();
        
        $userAuth=Auth::id();
        $isFriend=  Friends::where([
                        ['id_blogger', $userAuth],
                        ['id_friend', $id],
                    ])->get();
                    
        $isFriend=count($isFriend);

        return view('auth.blogger.profile',compact('dataUser','dataFriend','isFriend'));
    }
    
    public function favorite(){
        $dataFriendsBlogger=Friends::get();
        return view('auth.blogger.friendslist', array("dataFriendsBlogger"=>$dataFriendsBlogger));
    }
    public function addFriend($id){
        $Friend= new Friends();
            $Friend->id_blogger=Auth::id();
            $Friend->id_friend=$id;
        $Friend->save();
        return redirect('blogger/favorite');
    }
    public function deleteFriend($id){
        $Friend= Friends::where([
            ['id_blogger',Auth::id()],
            ['id_friend',$id]
        ])->delete();
        return redirect('blogger/favorite');
    }

}
