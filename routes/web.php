<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//for public route

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/post', [App\Http\Controllers\BlogsController::class, 'post'])->name('blog.post');
Route::get('/post/{slug}', [App\Http\Controllers\BlogsController::class, 'show'])->name('blog.show');
Route::get('/profile/{slug}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/category/{slug}', [App\Http\Controllers\CategoryController::class, 'showslug'])->name('category.showslug');
Route::get('/tag/{slug}', [App\Http\Controllers\TagController::class, 'show'])->name('tag.show');

//auth with ajax
Route::post('login/ajax', [App\Http\Controllers\Auth\LoginController::class, 'ajaxlogin'])->name('login.ajax');
Route::post('register/ajax', [App\Http\Controllers\Auth\LoginController::class, 'ajaxregister'])->name('register.ajax');

//login with google
Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//login with discord
Route::get('login/discord', [App\Http\Controllers\Auth\LoginController::class, 'redirectToDiscord'])->name('login.discord');
Route::get('login/discord/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleDiscordCallback']);

//comment on a post
Route::get('/post/{slug}/comments', [App\Http\Controllers\CommentController::class, 'show'])->name('comment.show');
Route::post('/post/{slug}/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');


//for author route
Route::get('/panel',[App\Http\Controllers\Author\AuthorController::class, 'index'])->name('author.dashboard')->middleware('role:Author');
Route::middleware(['auth','role:Author,Admin'])->prefix('/panel')->group(function () {
    Route::get('/create-post',[App\Http\Controllers\BlogsController::class, 'create'])->name('blog.create');
    Route::get('/postlist',[App\Http\Controllers\BlogsController::class, 'authorblog'])->name('author.blog');
    Route::post('/store',[App\Http\Controllers\BlogsController::class, 'store'])->name('blog.store');
    Route::post('/upload', [App\Http\Controllers\BlogsController::class, 'upload'])->name('upload');
    Route::get('/edit/{id}', [App\Http\Controllers\BlogsController::class, 'edit'])->name('blog.edit');
    Route::patch('/update/{id}', [App\Http\Controllers\BlogsController::class, 'update'])->name('blog.update');
    Route::delete('/delete/{id}', [App\Http\Controllers\BlogsController::class, 'delete'])->name('blog.delete');
    Route::get('/trash', [App\Http\Controllers\BlogsController::class, 'trash'])->name('blog.trash');
    Route::delete('/trash/restore/{id}', [App\Http\Controllers\BlogsController::class, 'restore'])->name('blog.restore');
    Route::delete('/trash/permanent/{id}', [App\Http\Controllers\BlogsController::class, 'permanentDelete'])->name('blog.restore');
    Route::get('/post/{id}/tags',[App\Http\Controllers\TagController::class, 'tags'])->name('blog.tags');
    Route::get('/profile/{slug}/overview',[App\Http\Controllers\ProfileController::class, 'overview'])->name('profile.overview');
    Route::get('/profile/{slug}/info',[App\Http\Controllers\ProfileController::class, 'info'])->name('profile.info');
    Route::post('/profile/{slug}/info',[App\Http\Controllers\ProfileController::class, 'store'])->name('profile.infopost');
    Route::get('/profile/{slug}/change-password',[App\Http\Controllers\ProfileController::class, 'changepass'])->name('profile.changepass');
});
Route::middleware(['auth','role:Admin'])->prefix('/admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\adminController::class, 'index'])->name('admin.dashboard');
    Route::get('/bloglist', [App\Http\Controllers\BlogsController::class, 'list'])->name('blog.list');
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/show/{id}', [App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
    Route::get('/category/list', [App\Http\Controllers\CategoryController::class, 'list'])->name('category.list');
    Route::post('/category/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
    Route::patch('/category/update/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::get('/userlist', [App\Http\Controllers\Admin\adminController::class, 'list'])->name('user.list');
    // Route::group(["prefix" => 'categories'], function () {
    //     Route::get('/', 'CategoriesController@index')->name('category.index');
    //     Route::post('/', 'CategoriesController@store')->name('category.store');
    //     Route::get('/create', 'CategoriesController@create')->name('category.create');
    //     Route::get('/{id}/edit', 'CategoriesController@edit')->name('category.edit');
    //     Route::patch('/{id}', 'CategoriesController@update')->name('category.update');
    //     Route::get('/{id}', 'CategoriesController@show')->name('category.show');
    //     Route::delete('/{id}', 'CategoriesController@destroy')->name('category.delete');
    // });

    // Route::group(["prefix" => 'tags'], function () {
    //     Route::get('/', 'TagsController@index')->name('tag.index');
    //     Route::post('/', 'TagsController@store')->name('tag.store');
    //     Route::get('/create', 'TagsController@create')->name('tag.create');
    //     Route::get('/{id}/edit', 'TagsController@edit')->name('tag.edit');
    //     Route::patch('/{id}', 'TagsController@update')->name('tag.update');
    //     Route::get('/{id}', 'TagsController@show')->name('tag.show');
    //     Route::delete('/{id}', 'TagsController@destroy')->name('tag.delete');
    // });


    // Route::group(["prefix" => 'posts'], function () {
    //     Route::get('/', 'PostsController@index')->name('post.index');
    //     Route::post('/', 'PostsController@store')->name('post.store');
    //     Route::get('/create', 'PostsController@create')->name('post.create');
    //     Route::get('/{id}/edit', 'PostsController@edit')->name('post.edit');
    //     Route::patch('/{id}', 'PostsController@update')->name('post.update');
    //     Route::get('/{id}', 'PostsController@show')->name('post.show');
    //     Route::delete('/{id}', 'PostsController@destroy')->name('post.delete');

    //     Route::post('/post-upload-image', 'PostImageController@store')->name('image.store');
    // });

    // Route::group(["prefix" => 'projects'], function () {
    //     Route::get('/', 'ProjectsController@index')->name('project.index');
    //     Route::post('/', 'ProjectsController@store')->name('project.store');
    //     Route::get('/create', 'ProjectsController@create')->name('project.create');
    //     Route::get('/{id}/edit', 'ProjectsController@edit')->name('project.edit');
    //     Route::patch('/{id}', 'ProjectsController@update')->name('project.update');
    //     Route::get('/{id}', 'ProjectsController@show')->name('project.show');
    //     Route::delete('/{id}', 'ProjectsController@destroy')->name('project.delete');
    //     Route::delete('/project-image-delete/{projectImage}', 'ProjectImageController@destroy')->name('projectImage.delete');
    // });

    // Route::group(["prefix" => 'subscribers'], function () {
    //     Route::get('/', 'SubscribersController@index')->name('subscriber.index');
    // });
});
