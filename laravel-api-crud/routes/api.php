<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::post('/login','App\Http\Controllers\AuthController@login');
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/get-all-product','App\Http\Controllers\ProductController@getAllProduct');
    Route::get('/get-one-product/{id}','App\Http\Controllers\ProductController@getOneProduct');
    Route::post('/save-product','App\Http\Controllers\ProductController@saveProduct');
    Route::delete('/delete-product/{id}','App\Http\Controllers\ProductController@deleteProduct');
    Route::put('/update-product/{id}','App\Http\Controllers\ProductController@updateProduct');
});

Route::get('/test',function (){
    return response(['message'=>'api work']);
});
