<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login_view'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/book-ticket', function () {
    return view('user.book-ticket');
})->name('book.ticket');

Route::get('/index', function () {
    return view('welcome');
})->name('index');

Route::get('/checkout', function () {
    return view('user.checkout');
})->name('checkout');

