<?php

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

Route::get('/create', function () {
    return view('admin.create_post');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\BlogsController::class, 'index'])->name('home');
Route::get('/blogpost', [App\Http\Controllers\BlogsController::class, 'show'])->name('home');
Route::get('/adminpanel', [App\Http\Controllers\Admin\adminController::class, 'index'])->name('admin');