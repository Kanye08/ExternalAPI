<?php

use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// get all books
Route::get('/books', [BooksController::class, 'index']);

// post/create route
Route::post('books', [BooksController::class, 'store']);

// read route
Route::get('books/{id}', [BooksController::class, 'show']);


// update route
Route::put('books/{id}', [BooksController::class, 'update']);

// delete route
Route::delete('books/{id}', [BooksController::class, 'destroy']);

// search route
Route::get('/books/search/{$query}', [BooksController::class, 'search']);