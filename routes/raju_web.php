<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\DepartmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','middleware' => ['auth']], function(){

    //Admin Controller
    Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('dashboard');

    Route::get('team', [AdminController::class, 'team'])->name('team');
    Route::get('user', [AdminController::class, 'user'])->name('user');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');

    //navigation controller
    Route::resource('navigation', NavigationController::class);

    //ticket controller
    Route::resource('ticket', TicketController::class);
    Route::post('/get/users', [TicketController::class, 'get_users'])->name('get.users');
    Route::post('/edit/users', [TicketController::class, 'edit_users'])->name('edit.users');

    //User Role controller
    Route::resource('user_role', UserRoleController::class);

    //Create User controller
    Route::resource('users', UserController::class);
    Route::post('role/permission/area', [UserController::class, 'get_role_permission_area'])->name('get_permission.users');

    //Priority controller
    Route::resource('priority', PriorityController::class);

     //Status controller
    Route::resource('status', StatusController::class);

    //Department controller
    Route::resource('department', DepartmentController::class);

});
