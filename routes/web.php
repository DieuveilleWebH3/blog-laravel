<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test2', function () {
    var_dump(value('test'));
    dd('test2');
});

Route::get('/test', [PostController::class, 'test']);

Route::get('/articles', [PostController::class, 'index'])->name('articleList');

# Route::get('/articles/{{$id}}/detail', [PostController::class, 'detail']);
Route::get('/articles/{id}', [PostController::class, 'detail'])->name('articleDetail');

Route::get('create', [PostController::class, 'create'])->name('articleCreate');
Route::post('store', [PostController::class, 'store'])->name('articleStore');

Route::get('article/{id}/update', [PostController::class, 'showUpdate'])->name('articleShowUpdate');
Route::put('article/{id}/update', [PostController::class, 'update'])->name('articleUpdate');
Route::put('article/{id}/update/image', [PostController::class, 'updatePicture'])->name('articleUpdatePicture');

Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('articleDelete');


Route::post('article/{postId}/comments', [CommentController::class, 'store'])->name('commentAdd');

/*
Route::get('/test', function () {
    // var_dump(value: 'test');
    // dd(vars: 'test');
});

Route::get('/posts/{id}', function ($id) {
    dd($id);
});

Route::get('/testing/{id?}', function ($id=0) {
    dd($id);
});

Route::get('/test2/{id}', function (\Illuminate\Http\Request  $request, $id) {
    dd($request);
});

*/
