<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BgController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index',[BgController::class, 'index']);
Route::get('/signup',[BgController::class, 'signup']);
Route::get('/login',[BgController::class, 'login']);
Route::get('/signout',[BgController::class, 'signout']);
Route::post('/login-store',[BgController::class, 'login_store']);
Route::post('/store',[BgController::class, 'store']);



Route::group(['middleware' => 'checkedloggedin'], function () {
    Route::get('/donor',[BgController::class, 'donor']);
    
    Route::post('/d-store',[BgController::class, 'd_store']);
    
    Route::post('/update-e/{id}',[BgController::class, 'update']);
    Route::post('/donor-list',[BgController::class, 'donor_list']);
    Route::get('/send-request/{id}',[BgController::class, 'send_request']);
    Route::post('/send-store/{id}',[BgController::class, 'send_store']);
    Route::get('/deshboard',[BgController::class, 'deshboard']);
    Route::get('/ac-request/{id}',[BgController::class, 'ac_request']);
    Route::post('/ac-store/{id}',[BgController::class, 'ac_store']);
    Route::get('/donation-history',[BgController::class, 'dhistory']);

Route::get('/admin-deshboard',[BgController::class, 'admin']);
Route::get('/admin/edit/{id}',[BgController::class, 'edit']);
Route::post('/admin/update-e/{id}',[BgController::class, 'update']);
Route::get('/admin/delete/{id}',[BgController::class, 'delete']);
});