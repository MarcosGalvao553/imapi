<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryTransactionsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsQuantitiesController;
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

Route::group(['middleware' => 'api'], function () {
    Route::group(['prefix' => 'auth'], function(){
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);  
    });

    Route::group(['prefix' => 'products'], function(){
        Route::post('/', [ProductsController::class, 'index']);
        Route::post('/create', [ProductsController::class, 'create']);
        Route::get('/show/{id}', [ProductsController::class, 'show']);
        Route::delete('/destroy/{id}', [ProductsController::class, 'destroy']);
        Route::post('/update', [ProductsController::class, 'update']);
    });

    Route::group(['prefix' => 'products-quantities'], function(){
        Route::get('/', [ProductsQuantitiesController::class, 'index']);
        Route::post('/create', [ProductsQuantitiesController::class, 'create']);
        Route::get('/show/{id}', [ProductsQuantitiesController::class, 'show']);
        Route::delete('/destroy/{id}', [ProductsQuantitiesController::class, 'destroy']);
        Route::post('/update', [ProductsQuantitiesController::class, 'update']);
    });

    Route::group(['prefix' => 'inventory-transactions'], function(){
        Route::get('/', [InventoryTransactionsController::class, 'index']);
        Route::post('/create', [InventoryTransactionsController::class, 'create']);
        Route::get('/show/{id}', [InventoryTransactionsController::class, 'show']);
    });
});
