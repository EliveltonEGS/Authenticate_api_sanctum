<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, CategoryController};


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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::controller(CategoryController::class)->group(function () {
        Route::post('/category/create', 'create');
        Route::get('/category/get', 'get');
    });
});
Route::controller(AuthController::class)->group(function () {
   Route::post('/create', 'createUser');
    Route::post('/login', 'login');
});
