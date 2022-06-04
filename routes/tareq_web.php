<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DepartmentController;


Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    Route::resource('status', StatusController::class);
    Route::resource('department', DepartmentController::class);
});
