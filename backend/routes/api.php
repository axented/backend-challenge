<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix'=>'logueo'],function(){
    Route::post('signin',                    [LoginController::class, 'signin']);
    Route::post('signout',                    [LoginController::class, 'signout']);
});

Route::group(['prefix'=>'blogger'],function(){
    Route::post('store',                    [UserController::class, 'store']);
    Route::get('list/{idUserAuth}',         [UserController::class, 'list'])->where('idUserAuth', '[0-9]+');
    Route::get('profile/{id}',              [UserController::class, 'profile'])->where('id', '[0-9]+');
    Route::get('favorite/{idUserAuth}',     [UserController::class, 'favorite'])->where('idUserAuth', '[0-9]+');
    Route::post('addFriend',                [UserController::class, 'addFriend']);
    Route::post('deleteFriend',             [UserController::class, 'deleteFriend']);
    Route::post('search',                   [UserController::class, 'search']);
});