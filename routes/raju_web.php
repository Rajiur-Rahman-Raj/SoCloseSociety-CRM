<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    Route::resource('priority', PriorityController::class);
    Route::resource('users', UserController::class);

    Route::post('role/permission/area', [UserController::class, 'get_role_permission_area'])->name('get_permission.users');

});
