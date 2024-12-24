<?php

use App\Livewire\Admin\Users;
use App\Livewire\Authentication\Login;
use App\Livewire\Counter;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',Login::class);


Route::middleware(['auth:admin', 'auth.session'])->group(function () {
    Route::get('/counter',Counter::class);
    Route::get('/dashboard',Dashboard::class);
    Route::get('/users',Users::class);
    Route::get('/logout',[Login::class,'logout']);
});