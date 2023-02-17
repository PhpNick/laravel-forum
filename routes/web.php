<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [ThreadsController::class, 'index'])->name('main');
Route::get('threads/create', [ThreadsController::class, 'create']);
Route::get('threads/{channel}/{thread}', [ThreadsController::class, 'show']);
Route::delete('threads/{channel}/{thread}', [ThreadsController::class, 'destroy']);
Route::post('threads', [ThreadsController::class, 'store']);
Route::get('threads/{channel}', [ThreadsController::class, 'index']);

Route::get('channels/create', [ChannelsController::class, 'create']);
Route::post('channels', [ChannelsController::class, 'store']);

Route::post('/threads/{channel}/{thread}/replies', [RepliesController::class, 'store']);
Route::delete('/replies/{reply}', [RepliesController::class, 'destroy']);

Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store']);

Route::get('/user/{user}', [UserController::class, 'show'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
