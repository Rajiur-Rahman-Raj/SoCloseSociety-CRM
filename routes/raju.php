<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    Route::get('priority', [PriorityController::class, 'priority'])->name();

});
