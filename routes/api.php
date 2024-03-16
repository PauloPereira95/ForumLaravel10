<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ReplySupportApiController;

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
// Generate Token
Route::post('/login', [AuthController::class, 'auth']) ;

Route::middleware(['auth:sanctum'])->group(function(){
    Route::apiResource('/supports', SupportController::class);

    // Get Replies Support
    Route::get('/replies/{support_id}' ,[ ReplySupportApiController::class ,'getRepliesFromSupport']);
    // Post reply
    Route::post('/replies/{support_id}' , [ReplySupportApiController::class, 'createNewReplie']);
    // Delete Reply
    Route::delete('/replies/{id}' , [ReplySupportApiController::class , 'destroy']);

    // return the authenticated user
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
