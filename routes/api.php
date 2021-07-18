<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resource('userRoles','User\UserRolesController');
Route::resource('districts','District\DistrictController');
Route::resource('stations','Station\StationController');
Route::resource('users','User\UserController');
Route::resource('complaints','Complaint\ComplaintController');