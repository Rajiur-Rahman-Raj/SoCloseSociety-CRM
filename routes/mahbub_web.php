<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserRoleController;


Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

   Route::resource('user_role', UserRoleController::class);

});
