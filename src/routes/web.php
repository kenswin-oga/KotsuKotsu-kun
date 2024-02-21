<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\LineBotController;

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

Route::get('/', function () {
    return view('top');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::get('/recipe/{id}', [RecipeController::class, 'index'])->name('recipe-list');

Route::post('webhook/linebot', [LineBotController::class, 'reply']);
Route::get('/linebot/send', [LineBotController::class, 'sendBroadcastMessage']);