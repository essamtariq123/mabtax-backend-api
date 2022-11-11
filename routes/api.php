<?php

use App\Http\Controllers\PersonalNtnController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SalesTaxController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// User API

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [RegisterController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::post('/sales-tax', [SalesTaxController::class, 'store']);
    Route::get('/user-info', [ProfileController::class, 'show']);
    Route::post('/password-update', [ProfileController::class, 'password_update']);
    Route::post('/personal-info', [ProfileController::class, 'personal_info']);
    Route::post('/ntn-personal', [PersonalNtnController::class, 'store']);
    Route::post('/logout', [RegisterController::class, 'logout']);
});

Route::middleware(['auth:api', 'admin'])->group(function () {
    Route::post('/', [SalesTaxController::class, 'store']);
});
