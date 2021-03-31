<?php

use App\Http\Controllers\Web\Admin\CategoryController;
use App\Http\Controllers\Web\Admin\SubCategoryController;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\User\BlogController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'registerIndex']);
    Route::post('register', [AuthController::class, 'register']);
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [PageController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::resource('blogs', (string)BlogController::class);
    Route::group(['middleware' => 'auth.admin'], function () {
        Route::resource('categories', (string)CategoryController::class);
        Route::resource('subcategories', (string)SubCategoryController::class);
    });
});
