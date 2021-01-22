<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PostController, TagController, HomeController};
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix("posts")->group(function () {
    Route::get('', [PostController::class, 'index'])->name('posts-list');
    Route::get('/admin', [PostController::class, 'admin'])->name('posts-admin')->middleware('auth');
    Route::get('/novo', [PostController::class, 'create'])->name('posts-create')->middleware('auth');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('posts-show');
    Route::post('', [PostController::class, 'store'])->name('posts-store')->middleware('auth');
    Route::get('{id}', [PostController::class, 'edit'])->name('posts-edit')->middleware('auth');
    Route::put('{id}', [PostController::class, 'update'])->name('posts-update')->middleware('auth');
    Route::delete('{id}', [PostController::class, 'destroy'])->name('posts-destroy')->middleware('auth');
});

Route::prefix("tags")->group(function () {
    Route::get('/novo', [TagController::class, 'create'])->name('tags-create')->middleware('auth');
    Route::get('/admin', [TagController::class, 'admin'])->name('tags-admin')->middleware('auth');
    Route::get('/tag/{id}', [TagController::class, 'show'])->name('tags-show');
    Route::post('', [TagController::class, 'store'])->name('tags-store')->middleware('auth');
    Route::get('{id}', [TagController::class, 'edit'])->name('tags-edit')->middleware('auth');
    Route::put('{id}', [TagController::class, 'update'])->name('tags-update')->middleware('auth');
    Route::delete('{id}', [TagController::class, 'destroy'])->name('tags-destroy')->middleware('auth');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
