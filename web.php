<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/like', function () {
    return view('users/display_product_user');
});
Route::get('/category_add', function () {
    return view('admin/category_add');
});
Route::resource('cat', 'App\Http\Controllers\CategoryController');
Route::resource('/product', 'App\Http\Controllers\ProductController');

Route::get('/add_form', function () {
    return view('admin/add_user');
});
Route::get('/display', [ProductUserController::class, "create"]);
Route::get('/separateusers', [HomeController::class, "index"]);
Route::post('/add_user', [HomeController::class, "addUser"]);
Route::get('/display_user', [HomeController::class, "show"]);
Route::get('delete/{id}', [HomeController::class, "destroy"]);
Route::get('edit/{id}', [HomeController::class, "showData"]);
Route::post('edit', [HomeController::class, "update"]);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [HomeController::class, "index"])->name('dashboard');
