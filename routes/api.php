<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/halo', function(){
//     return ["dhodo" => "perngawian"];
// });

// Route::get('HaloController', [HaloController::class, 'index']);
// Route::resource('/', Api\HaloController::class);

Route::resource('siswa', SiswaController::class);

// Route::get('/index', [SiswaController::class, 'index'])->name('index');
//     Route::get('/create', [SiswaController::class, 'create'])->name('create');
//     Route::post('/store', [SiswaController::class, 'store'])->name('store');
//     Route::get('/show/{id}', [SiswaController::class, 'show'])->name('show');
//     Route::post('/update/{id}', [SiswaController::class, 'update'])->name('update');
//     Route::get('/destroy/{id}', [SiswaController::class, 'destroy'])->name('destroy');

// Route::resource('book', BookController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request){
    return $request->user();
});

// public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
// Route::get('/authors', [AuthorController::class, 'index']);
// Route::get('/authors/{id}', [AuthorController::class, 'index']);

// protected routes
Route::middleware('auth:sanctum')->group(function(){
    Route::resource('books', BookController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::resource('authors', AuthorController::class)->except('create', 'edit', 'show', 'index');    
});



