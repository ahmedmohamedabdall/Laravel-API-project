<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::get('/products',[ProductController::class,'index']);

//Route::get('/product/show/{id}', [ProductController::class, 'show']);

//Route::post('/product/store', [ProductController::class, 'store']);

//Route::post('/product/destroy/{id}', [ProductController::class, 'destroy']);
//Route::resource('/products',ProductController::class);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//public routes
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{product}', [ProductController::class, 'show']);

Route::post('/register',[AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

//any route inside this is protected need a token to access
Route::group(['middleware'=>['auth:sanctum']],function(){

    Route::post('/products/bulkStore', [ProductController::class, 'bulkStore']);

    Route::post('/products/store', [ProductController::class, 'store']);

    Route::post('/logout', [AuthController::class, 'logout']);

    

    Route::put('/products/{product}', [ProductController::class, 'update']);

    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
});