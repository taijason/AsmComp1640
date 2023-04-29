<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaController2;
use App\Http\Controllers\UserController;
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

Route::get('list', [IdeaController::class, 'index']);
Route::get('add', [IdeaController::class, 'add']);
Route::post('save', [IdeaController::class, 'save']);
Route::get('edit/{id}', [IdeaController::class, 'edit']);
Route::post('update', [IdeaController::class, 'update']);
Route::get('delete/{id}', [IdeaController::class, 'delete']);

Route::get('list2', [CommentController::class, 'index']);
Route::get('add2', [CommentController::class, 'add2']);
Route::post('save', [CommentController::class, 'save']);
Route::get('edit2/{id}', [CommentController::class, 'edit2']);
Route::post('update', [CommentController::class, 'update']);
Route::get('delete/{id}', [CommentController::class, 'delete']);

Route::get('/', [IdeaController2::class, 'index']);
Route::get('/ideas', [IdeaController2::class, 'getIdeas']);

Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/register-process', [UserController::class, 'registerProcess'])->name('register-process');
Route::post('/login-process', [UserController::class, 'loginProcess'])->name('login-process');
Route::get('/logout', [UserController::class, 'logout']);
