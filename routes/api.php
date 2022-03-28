<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'Register']);
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'Login']);
//Customer
Route::post('/customer/register',[\App\Http\Controllers\AuthCustomer\RegisterController::class,'Register']);
Route::post('/customer/login', [\App\Http\Controllers\AuthCustomer\LoginController::class,'Login']);
Route::post('/customer/logout',[\App\Http\Controllers\AuthCustomer\LogoutController::class,'Logout']);
//End Customer
Route::group(['middleware' => "auth:sanctum"], function () {
    Route::post('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'Logout']);
    Route::post('/customer/logout',[\App\Http\Controllers\AuthCustomer\LogoutController::class,'Logout']);
    Route::get('/book', [\App\Http\Controllers\BookController::class, 'index']);
    Route::get('book/{id}', [\App\Http\Controllers\BookController::class, 'show']);
    Route::post('book', [\App\Http\Controllers\BookController::class, 'store']);
    Route::put('book/{id}', [\App\Http\Controllers\BookController::class, 'update']);
    Route::delete('book/{id}', [\App\Http\Controllers\BookController::class, 'destroy']);

    Route::get('category', [CategoryController::class, 'index']);
    Route::get('category/{id}', [\App\Http\Controllers\CategoryController::class, 'show']);
    Route::get('category/countbook/{id}', [\App\Http\Controllers\CategoryController::class, 'getcountbook']);
    Route::post('category', [\App\Http\Controllers\CategoryController::class, 'store']);
    Route::put('category/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
    Route::delete('category/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy']);
});


