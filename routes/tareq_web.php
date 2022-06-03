<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StatusController;


Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    Route::resource('status', StatusController::class);
});
