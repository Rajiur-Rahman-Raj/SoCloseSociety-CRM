<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PriorityController;


Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    Route::resource('priority', PriorityController::class);

});
