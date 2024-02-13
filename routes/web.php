<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/post/{post}', [PublicController::class, 'post'])->name('post');

Route::get('/tag/{tag}', [PublicController::class, 'tag'])->name('tag');

Route::get('/user/{user}', [PublicController::class, 'user'])->name('user');


Route::get('/admin/posts/{post}/view', [PostController::class, 'view'])->name('posts.view');

Route::resource('/admin/posts', PostController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/post/{post}/like', [PublicController::class, 'like'])->name('like');
    Route::post('/post/{post}', [PublicController::class, 'comment'])->name('comment');
    Route::get('/user/{user}/follow', [PublicController::class, 'follow'])->name('follow');
    Route::resource('/admin/posts', PostController::class);
    Route::get('/feed/{user}', [PublicController::class, 'user'])->name('user');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
