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



Route::post('register',[UserController::class,'registers'])->name('registers');
Route::post('register/verify',[UserController::class,'register_verify'])->name('register.verify');
Route::post('login',[UserController::class,'login'])->name('login');
Route::post('login/verify',[UserController::class,'login_verify'])->name('login.verify');

Route::GET('beranda/all',[MaterialController::class,'beranda'])->name('beranda.all');


Route::POST('store',[MaterialController::class,'store'])->name('created.stok');//Menambahakan Data Baru
Route::GET('stock/all',[MaterialController::class,'viewAll'])->name('stok.all');
Route::POST('stock/search/only',[MaterialController::class,'viewOnly'])->name('search.stok');
Route::POST('stock/add',[MaterialController::class,'tamba_qty'])->name('tamba_qty');//Menambahkan Stok Material
Route::DELETE('stock/del',[MaterialController::class,'delete_stok'])->name('delete.stok');
Route::PUT('stock/edit',[MaterialController::class,'edit_stok'])->name('edit.stok');

Route::group(['middleware' => 'jwt.verify'],function($router){
    
    Route::GET('all',[MaterialController::class,'getAll'])->name('materials.all');//menampilkan semua material
    Route::GET('history/{id}',[MaterialController::class,'get_only'])->name('materials.only');//menampilkan 1 material

    Route::GET('profil/{id}',[UserController::class,'profil'])->name('user.only');
    Route::POST('profil/edit',[UserController::class,'profil_updated'])->name('user.update');
    Route::post('profil/logout',[UserController::class,'profil_logouted'])->name('user.logout');

    // Route::POST('stock',[MaterialController::class,'view'])->name('stok');
    // Route::POST('store',[MaterialController::class,'store'])->name('created.stok');
    // Route::POST('stock/search',[MaterialController::class,'search_stok'])->name('search.stok');
    

});
