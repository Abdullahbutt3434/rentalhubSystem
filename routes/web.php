<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Auth::routes(['verify'=>'true']);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::resource('admin',AdminController::class);
Route::resource('categories',CategoryController::class);
Route::resource('posts',PostController::class);
Route::resource('registeredusers',RegisteredUserController::class);
Route::get('posts/approve/{id}',[PostController::class, 'approvePost'])->name('approvePost');
Route::get('posts/disapprove/{id}',[PostController::class, 'disapprove'])->name('disapprove');
Route::get('properties',[PostController::class, 'propertiesIndex'])->name('propertiesIndex');

Route::get('users',[UserController::class, 'index'])->name('users');
Route::Delete('users/{id}',[UserController::class, 'destroy'])->name('users.destroy');
Route::get('users/profile/{id}',[UserController::class, 'profile'])->name('users.profile');
Route::get('users/approve/{id}',[UserController::class, 'approveUser'])->name('approveUser');
Route::get('users/blockUser/{id}',[UserController::class, 'blockUser'])->name('blockUser');
Route::get('users/{id}/edit',[UserController::class, 'edit'])->name('user.edit');
Route::post('users/update',[UserController::class, 'update'])->name('user.update');

Route::get('search',[\App\Http\Controllers\SearchController::class, 'search'])->name('search');
Route::get('SearchUser',[\App\Http\Controllers\SearchController::class, 'SearchUser'])->name('SearchUser');
