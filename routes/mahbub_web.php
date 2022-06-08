<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DepartmentController;


Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    // Route::resource('agent', AgentController::class);
    Route::post('/edit/department', [DepartmentController::class, 'edit_dapartment'])->name('edit.department');

});
