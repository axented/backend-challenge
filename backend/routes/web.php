<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix('logueo')->group(function () {
    Route::get('view',      [LoginController::class, 'view']);
    Route::post('signin',   [LoginController::class, 'signin']);
    //Route::get('signout',   [LoginController::class, 'signout']);
});


Route::group(['prefix'=>'blogger'],function(){
    Route::get('create',    [UserController::class, 'create']);
    Route::post('store',    [UserController::class, 'store']);
    Route::get('list',      [UserController::class, 'list']);
    Route::get('favorite',  [UserController::class, 'favorite']);
    Route::get('profile/{id}',   [UserController::class, 'profile'])->where('id', '[0-9]+');

    Route::get('addFriend/{id}',   [UserController::class, 'addFriend'])->where('id', '[0-9]+');
    Route::get('deleteFriend/{id}',   [UserController::class, 'deleteFriend'])->where('id', '[0-9]+');
    Route::get('search',    [UserController::class, '']);
});