<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserRoleController;


Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

   Route::resource('user_role', UserRoleController::class);
   Route::resource('ticket', TicketController::class);
   Route::post('/get/users', [TicketController::class, 'get_users'])->name('get.users');
   Route::post('/edit/users', [TicketController::class, 'edit_users'])->name('edit.users');

});
