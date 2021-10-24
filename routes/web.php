<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;

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


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/


Route::get('/', [PostController::class, 'index'])->name('articleList');
Route::get('/articles/{id}', [PostController::class, 'detail'])->name('articleDetail');
Route::get('/create', [PostController::class, 'create'])->name('articleCreate');
Route::post('articles/store', [PostController::class, 'store'])->name('articleStore');
Route::get('article/{id}/update', [PostController::class, 'showUpdate'])->name('articleShowUpdate');
Route::put('article/{id}/update_save', [PostController::class, 'update'])->name('articleUpdate');
Route::put('article/{id}/update/image', [PostController::class, 'updatePicture'])->name('articleUpdatePicture');
Route::delete('articles/delete/{id}', [PostController::class, 'delete'])->name('articleDelete');


Route::post('article/{postId}/comments', [CommentController::class, 'store'])->name('commentAdd');
Route::delete('comment/{id}', [CommentController::class, 'delete'])->name('commentDelete');



Route::get('category/create', [CategoryController::class, 'create'])->name('categoryAdd');
Route::post('category/store', [CategoryController::class, 'store'])->name('categoryStore');
Route::delete('category/delete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');
Route::put('category/{id}/update', [CategoryController::class, 'update'])->name('categoryUpdate');



require __DIR__.'/auth.php';


