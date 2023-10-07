<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeerController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/auth')
    ->group(function () {
        Route::post('/login', LoginController::class)->name('auth.login');

        Route::middleware('auth:api')->group(function () {
            // Protected auth api routes
            // Route::get('/me', App\Http\Controllers\Auth\MeControler::class)->name('auth.me');
            // Route::post('/logout', App\Http\Controllers\Auth\LogoutController::class)->name('auth.logout');
        });
    });


Route::middleware('auth:api')->group(function () {
    Route::apiResource('beers', BeerController::class)->only(['index']);
});
