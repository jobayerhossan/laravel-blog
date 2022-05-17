<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FrontController;

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

Auth::routes();     


Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/blog/{slug}', [FrontController::class, 'singlepost'])->name('singlepost');
 
Route::get('/contact', function(){
    return view('layouts.contact');
});

Route::get('/category', function(){
    return view('layouts.category');
});

Route::get('/about', function(){
    return view('layouts.about');
});

Route::get('/post', function(){
    return view('layouts.post');
});

// admin Routes
// Admin Panel Routes
Route::group(['prefix' => 'my-admin'], function () {

    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    });

    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('post', PostController::class);

});