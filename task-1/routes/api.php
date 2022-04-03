<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\v1\RegisterController;
use App\Http\Controllers\API\v1\CategoriesController;
use App\Http\Controllers\api\v1\ArticlesController;
  
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
  
Route::get('register', [RegisterController::class, 'register']);
Route::get('login', [RegisterController::class, 'login']);
     
Route::middleware('auth:api')->group( function () {
    Route::resource('categories', CategoriesController::class);
    Route::resource('articles', ArticlesController::class); 
});
