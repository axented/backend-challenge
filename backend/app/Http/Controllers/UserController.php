<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*Base de datos Transaction-----*/
use Illuminate\Support\Facades\DB;
/*Models------------------------*/
use App\Models\User;
use App\Models\Friends;

class UserController extends Controller {

    public function store( Request $request ){
        try {

            $validatedData = $request->validate([
                'name'          => ' required | min:1 ',
                'email'         => ' required | email | min:1 ',
                'website'       => ' required | min:1 ',
                'picture_url'   => ' required | min:10 ',
            ]);

            DB::beginTransaction();
                $User= new User();
                    $User->name     =$request->input( "name" );
                    $User->email    =$request->input( "email" );
                    $User->website  =$request->input( "website" );
                    $User->picture  =$request->input( "picture_url" );
                $User->save();
            DB::commit();

            return $this->responseJSON( 200 , 'ok' );

        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responseJSON( 404 , 'Error' );
        }
    }

    public function list( $idUserAuth ){
        try {

            if ($idUserAuth > 0) {
                $dataBloggers = User::where( 'id' , '!=' , $idUserAuth )->get();
                return $this->responseDataJSON( 200 , $dataBloggers );
            }else{
                return $this->responseDataJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            return $this->responseJSON( 500, 'Error');
        }
    }

    public function profile( $id ){
        try {

            if ( $id > 0 ) {
                $dataUser   = User::find( $id );
                $dataFriend =Friends::select( 'id_friend' )->where( 'id_blogger' , $id )->get();
                return $this->responseDataProfileJSON( 200 , $dataUser , $dataFriend );
            }else{
                return $this->responseDataJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            return $this->responseJSON( 500 , 'Error' );
        }
    }
    
    public function favorite( $idUserAuth ){
        try {

            if ( $idUserAuth > 0 ) {
                $dataFriendsBlogger = Friends::select( 'id_friend' )->where( 'id_blogger' , $idUserAuth )->get();
                return $this->responseDataJSON( 200 , $dataFriendsBlogger );
            }else{
                return $this->responseDataJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            return $this->responseJSON( 500 , 'Error' );
        }
    }
    public function addFriend( Request $request ){
        try {

            $validatedData = $request->validate([
                'id_blogger'    => ' required | numeric ',
                'id_friend'     => ' required | numeric',
            ]);

            DB::beginTransaction();
            $idUserAuth     =$request->input( "id_blogger" );
            $idNewFriend    =$request->input( "id_friend" );

            $Friend = Friends::where([
                [ 'id_blogger'   , $idUserAuth ],
                [ 'id_friend'    , $idNewFriend ]
            ])->get();

            if( ! count($Friend) > 0 ){
                
                $Friend = new Friends();
                    $Friend->id_blogger = $idUserAuth;
                    $Friend->id_friend  = $idNewFriend;
                $Friend->save();
                DB::commit();
                return $this->responseJSON( 200 , 'ok' );

            }else{
                return $this->responseJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responseJSON( 505 , 'Error' );
        }
    }

    public function deleteFriend( Request $request ){
        try {

            $validatedData = $request->validate([
                'id_blogger'    => ' required | numeric ',
                'id_friend'     => ' required | numeric',
            ]);

            DB::beginTransaction();
            $idUserAuth         =$request->input( "id_blogger" );
            $idDeleteFriend     =$request->input( "id_friend" );

            if ( $idUserAuth > 0 && $idDeleteFriend > 0 ) {
                $Friend = Friends::where([
                    [ 'id_blogger'  ,$idUserAuth ],
                    [ 'id_friend'   ,$idDeleteFriend ]
                ])->delete();
                DB::commit();

                return $this->responseJSON( 200 , 'ok' );
            }else{
                return $this->responseJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responseJSON( 505 , 'Error' );
        }
    }

    public function search( Request $request ){
        try {
            
            $validatedData  = $request->validate([
                'search'    => ' required ',
            ]);
            
            $search = $request->input( "search" );
            $User   = User::where( 'name' , $search )->orWhere( 'website' , $search )->get();
            return $this->responseDataJSON( 200 , $User );

        } catch (\Exception $ex) {
            return $this->responseJSON( 505 , 'Error' );
        }
    }
    /*----------------------------------------------*/
    public function responseJSON( $responseHTTP , $message ){
        return json_encode(array(
            'status'        => $responseHTTP,
            'response'      => $message
        ));
    }

    public function responseDataJSON( $responseHTTP, $Data ){
        return json_encode(array(
            'status'            => $responseHTTP,
            'response'          => array(
                'Data'          => $Data
            )));
    }

    public function responseDataProfileJSON( $responseHTTP, $DataProfile, $listFriends ){
        return json_encode(array(
            'status'            => $responseHTTP,
            'response'          => array(
                'dataProfile'   =>$DataProfile,
                'listFriends'   =>$listFriends
            ),
        ));
    }

}
