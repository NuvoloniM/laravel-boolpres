<?php

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

// creo un gruppo di rotte che portano al controller nuovo per il front end inerente ai post
// non devo mettere il prefix api perchè lo fa in automatico laravel/vue
//localhost:8000/api/posts
Route::namespace('Api')->group( function(){
    Route::get('/posts', 'PostController@index');
});
