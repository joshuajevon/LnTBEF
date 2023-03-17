<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
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

Route::middleware('isAdmin')->group(function(){
    Route::get('/create-book', [BookController::class, 'createBook']);
});

Route::get('/', [BookController::class, 'show']);

Route::post('store-book', [BookController::class, 'storeBook']);

Route::get('/edit-book{id}', [BookController::class, 'edit'])->name('edit');

Route::patch('/update-book/{id}', [BookController::class, 'update'])->name('update');

Route::delete('/delete-book/{id}', [BookController::class, 'delete'])->name('delete');

Route::get('/create-category', [CategoryController::class, 'createCategory']);

Route::post('/store-category', [CategoryController::class, 'storeCategory']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/send-mail', [MailController::class, 'sendMail']);
