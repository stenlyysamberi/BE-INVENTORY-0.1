<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api'],function(){
    Route::post('/materials',[MaterialController::class,'store'])->name('materials.post');
    Route::post('/material',[MaterialController::class,'view'])->name('materials.get');

    Route::post('/users',[UserController::class,'create'])->name('users.post');
    Route::post('/verify',[UserController::class,'verify'])->name('users.verify');
    Route::post('/users/{id}/',[UserController::class,'users_id'])->name('users.get.only');
    Route::get('/users',[UserController::class,'users_all'])->name('users.get.all');
});
