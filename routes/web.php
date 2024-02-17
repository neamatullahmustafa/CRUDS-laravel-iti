<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
});
Route::get(
    '/',
    [UserController::class, 'listUsers']
);
Route::get(
    '/user/create',
    [UserController::class, 'create']
);
Route::get(
    '/user/store',
    [UserController::class, 'store']
);
Route::get(
    '/user/show/{user}',
    [UserController::class, 'show']
);
Route::get(
    '/user/update/{user}',
    [UserController::class, 'update']
);
Route::get(
    '/user/edit/{user}',
    [UserController::class, 'edit']
);
Route::delete(
    '/user/delete/{user}',
    [UserController::class, 'delete']
);

Route::resource('posts', PostController::class); //auto route
