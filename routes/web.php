<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/user', [PostController::class, 'userPosts'])->name('posts.user')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like')->middleware('auth');
Route::post('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike')->middleware('auth');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->where('post', '[0-9]+');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->where('post', '[0-9]+')->middleware('auth');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->where('post', '[0-9]+')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->where('post', '[0-9]+')->middleware('auth');
Route::get('/posts/search/', [PostController::class, 'search'])->name('posts.search');
Route::get('/posts/categories/{category}', [PostController::class, 'postsByCategory'])->name('posts.category.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::post('/contact', [App\Http\Controllers\ContactController::class, 'sendEmail']);

require __DIR__.'/auth.php';
