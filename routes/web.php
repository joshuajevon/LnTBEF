<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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

//bad practice
// Route::get('/view', function () {
//     return view('view');
// });

Route::get('/', [BookController::class, 'show']);

Route::get('/create-book', [BookController::class, 'createBook']);

Route::post('store-book', [BookController::class, 'storeBook']);

Route::get('/edit-book{id}', [BookController::class, 'edit'])->name('edit');

Route::patch('/update-book/{id}', [BookController::class, 'update'])->name('update');

Route::delete('/delete-book/{id}', [BookController::class, 'delete'])->name('delete');

Route::get('/create-category', [CategoryController::class, 'createCategory']);

Route::post('/store-category', [CategoryController::class, 'storeCategory']);
