<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\TrainDelayController;
use App\Http\Controllers\UserController;
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
Route::get('/index', function () {
    return view('welcome');
})->name('index');


Route::get('/about-us', function () {
    return view('about-us');
});



Route::get('/login', [AuthController::class, 'login_view'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Froget password
Route::get('/frogot', [AuthController::class, 'frogot_view'])->name('frogot');
Route::post('/froget_password', [AuthController::class, 'froget_password'])->name('froget_password');
// Password reset link route
Route::get('password/reset/{token}/{email}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset_password', [AuthController::class, 'reset_password'])->name('reset_password');

// Admin routes
Route::middleware(['checkAdmin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');

    Route::post('/add_train', [TrainController::class, 'add_train'])->name('add_train');

    Route::get('/add_train', [TrainController::class, 'add_trainView'])->name('add_train');

    Route::get('/all_users', [AdminController::class, 'all_users'])->name('all_users');

    Route::get('/train_delay,', [TrainDelayController::class, 'delay_view'])->name('train_delay');
    Route::get('/train_cancel,', [TrainDelayController::class, 'cancel_view'])->name('train_cancel');

    Route::post('/train_delay,', [TrainDelayController::class, 'delay'])->name('train_delay');
    Route::post('/train_cancel,', [TrainDelayController::class, 'cancel'])->name('train_cancel');
});

// User routes
Route::middleware(['checkUser'])->group(function () {
    Route::get('/user-dashboard', [UserController::class, 'user_dashboard'])->name('user_dashboard');

    Route::post('train_search', [UserController::class, 'search_train'])->name('search_train');
});

Route::get('/book-ticket', function () {
    return view('user.book-ticket');
})->name('book.ticket');

Route::get('/checkout', function () {
    return view('user.checkout');
})->name('checkout');





