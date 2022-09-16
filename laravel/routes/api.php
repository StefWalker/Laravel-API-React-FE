<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('book', BookController::Class);                              // Route to request Book CRUD
Route::apiResource('author', AuthorController::Class);                          // Route to request Author CRUD
Route::get('book/byAuthor/{author}', [BookController::Class, 'byAuthor']);      // Route to request book by author
Route::get('book/ifAvailable/{book}', [BookController::Class, 'ifAvailable']);  // Route to request available books list