<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\StoreController;
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

Route::get('/areas', [AreaController::class, 'areas']);
Route::get('/stores', [StoreController::class, 'stores']);

Route::controller(AuthController::class)->prefix('user/')->group(function () {
    Route::post('', 'register');
    Route::post('login', 'login');

    Route::middleware('auth:sanctum')->group(function () {
        Route::put('', 'update');
        Route::delete('', 'destroy');
        Route::post('logout', 'logout');
        Route::get('', 'me');
    });
});

Route::get('/err', function () {
    return response()->json(['err'], 400);
})->name('err');
