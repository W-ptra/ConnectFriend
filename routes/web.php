<?php

use App\Models\Friends;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/friend',[App\Http\Controllers\friendController::class, 'index']);
Route::post('/friend/add',[App\Http\Controllers\friendController::class, 'add']);
Route::get('/chat',[App\Http\Controllers\chatController::class, 'index']);
Route::get('/chat/send',[App\Http\Controllers\chatController::class, 'send']);
Route::post('/chat/send',[App\Http\Controllers\chatController::class, 'createChat']);
