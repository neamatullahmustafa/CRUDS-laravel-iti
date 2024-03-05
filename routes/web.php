<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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
    return view('/register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::Middleware('guest')->group(function () {
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/home', function () {
    return view('welcome');
});
Route::get(
    '/',
    [UserController::class, 'listUsers']
);
// });
// Route::Middleware('auth')->group(function () {

Route::get(
    '/user/create',
    [UserController::class, 'create']
)->middleware("auth");
Route::get(
    '/user/store',
    [UserController::class, 'store']
)->middleware("auth");
Route::get(
    '/user/show/{user}',
    [UserController::class, 'show']
)->middleware("auth");
Route::get(
    '/user/update/{user}',
    [UserController::class, 'update']
)->middleware("auth");
Route::get(
    '/user/edit/{user}',
    [UserController::class, 'edit']
)->middleware("auth");
Route::delete(
    '/user/delete/{user}',
    [UserController::class, 'delete']
)->middleware("auth");
Route::post('/logOut', [AuthController::class, 'logOut']);
Route::resource('posts', PostController::class)->middleware("auth"); //auto route

// });
require __DIR__ . '/auth.php';
