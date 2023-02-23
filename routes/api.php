<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\CommentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('authors', 'index');
});

Route::controller(MovieController::class)->group(function () {
    Route::get('movies', 'index');
    Route::post('movies', 'store');
    Route::get('movies/{id}', 'show');
});

Route::controller(LikeController::class)->group(function () {
    Route::post('like', 'store');
});

Route::controller(ViewController::class)->group(function () {
    Route::post('view', 'store');
});
Route::controller(CommentController::class)->group(function () {
    Route::get('comment', 'index');
    Route::post('comment', 'store');
});