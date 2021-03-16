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

            DB::beginTransaction();
                $User= new User();
                    $User->name     =$request->input( "name" );
                    $User->email    =$request->input( "email" );
                    $User->website  =$request->input( "website" );
                    $User->picture  =$request->input( "picture_url" );
                $User->save();
            DB::commit();

            return $this->responderJSON( 200 , 'ok' );

        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responderJSON( 404 , 'Error' );
        }
    }

    public function list( $idUserAuth ){
        try {

            if ($idUserAuth > 0) {
                $dataBloggers = User::where( 'id' , '!=' , $idUserAuth )->get();
                return $this->responderDataJSON( 200 , $dataBloggers );
            }else{
                return $this->responderDataJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            return $this->responderJSON( 500, 'Error');
        }
    }

    public function profile( $id ){
        try {

            if ( $id > 0 ) {
                $dataUser   = User::find( $id );
                $dataFriend =Friends::select( 'id_friend' )->where( 'id_blogger' , $id )->get();
                return $this->responderDataProfileJSON( 200 , $dataUser , $dataFriend );
            }else{
                return $this->responderDataJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            return $this->responderJSON( 500 , 'Error' );
        }
    }
    
    public function favorite( $idUserAuth ){
        try {

            if ( $idUserAuth > 0 ) {
                $dataFriendsBlogger = Friends::select( 'id_friend' )->where( 'id_blogger' , $idUserAuth )->get();
                return $this->responderDataJSON( 200 , $dataFriendsBlogger );
            }else{
                return $this->responderDataJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            return $this->responderJSON( 500 , 'Error' );
        }
    }
    public function addFriend( Request $request ){
        try {

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
                return $this->responderJSON( 200 , 'ok' );

            }else{
                return $this->responderJSON( 404 , 'Error' );
            }

        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responderJSON( 505 , 'Error' );
        }
    }

    public function deleteFriend( Request $request ){
        try {

            DB::beginTransaction();
            $idUserAuth  =$request->input( "id_blogger" );
            $idFriend    =$request->input( "id_friend" );

            if ( $idUserAuth > 0 && $idFriend > 0 ) {
                $Friend = Friends::where([
                    [ 'id_blogger'  ,$idUserAuth ],
                    [ 'id_friend'   ,$idFriend ]
                ])->delete();
                DB::commit();
            }

            return $this->responderJSON( 200 , 'ok' );

        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->responderJSON( 505 , 'Error' );
        }
    }

    public function search( Request $request ){
        try {

            $search = $request->input( "search" );
            $User   = User::where( 'name' , $search )->orWhere( 'website' , $search )->get();
            return $this->responderDataJSON( 200 , $User );

        } catch (\Exception $ex) {
            return $this->responderJSON( 505 , 'Error' );
        }
    }
    /*----------------------------------------------*/
    public function responderJSON( $codigo , $mensaje ){
        return json_encode(array(
            'status'        => $codigo,
            'response'      => $mensaje
        ));
    }

    public function responderDataJSON( $codigo, $Data ){
        return json_encode(array(
            'status'            => $codigo,
            'response'          => array(
                'Data'          => $mensaje
            )));
    }

    public function responderDataProfileJSON( $codigo, $DataProfile, $listFriends ){
        return json_encode(array(
            'status'            => $codigo,
            'response'          => array(
                'dataProfile'   =>$DataProfile,
                'listFriends'   =>$listFriends
            ),
        ));
    }

}
