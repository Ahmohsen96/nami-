<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\AdminAuthController;
use App\Http\Controllers\Dashboard\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;


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



    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);

    // Route::get('/profile/{id}', [ProfileController::class, "index"])->name("profile.index");
    // Route::get('/single-posts/{id}', [GetPostController::class, 'getPostById']);

    Route::post('/dashboard', [AdminAuthController::class, 'loginAdmin']);

    Route::get('/profile/{id}', [ProfileController::class, "index"])->name("profile.index");


    // Route::middleware('apiGuard')->group(function () {
    //     // Routes that require authentication with the 'api' guard

    // });


    // Route::get('/admin/dashboard', function () {
    //     // Only authenticated users with the "admin" guard are allowed to access this route
    // })->middleware('auth:admin');


Route::get('/users', [UserApiController::class, 'index']);
Route::post('/users', [UserApiController::class, 'store']);
Route::get('/users/{id}', [UserApiController::class, 'show']);
Route::put('/users/{id}', [UserApiController::class, 'update']);
Route::delete('/users/{id}', [UserApiController::class, 'destroy']);

// Route::middleware('auth:admin')->get('test/admin', function() {
//     return response()->json(['foo' => 'bar', 'user' => auth()->user()]);
//   });

//   Route::middleware('auth:api')->get('test/user', function() {
//     return response()->json(['foo' => 'bar', 'user' => auth()->user()]);
//   });




