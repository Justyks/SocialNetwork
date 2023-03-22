<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/register', [SignUpController::class, 'register']);
Route::post('/login', [SignInController::class, 'login']);
Route::get('/token', [SignUpController::class, 'getCSRF']);
Route::get('/user',[SignInController::class,'getAuthenticatedUser']);
Route::get('/chat', [ChatController::class, 'index']);
Route::get('/chat/{user_id}',[ChatController::class, 'fetchMessages']);
Route::post('/chat/{user_id}', [ChatController::class, 'sendMessage']);