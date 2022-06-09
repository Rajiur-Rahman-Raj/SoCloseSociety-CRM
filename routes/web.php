<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('locale/{locale}', function($locale){
    Session::put('locale', $locale);
        return back();
})->name('locale');
