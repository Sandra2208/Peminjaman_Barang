<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use PharIo\Manifest\AuthorCollectionIterator;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Routing\Controllers\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::middleware('only_guest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout']);    
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
    

    Route::middleware('only_admin')->group(function(){
        Route::get('dashboard', [DashboardController::class, 'index']);

        Route::get('barang', [BarangController::class, 'index']);
        Route::get('add-barang', [BarangController::class, 'add']);
        Route::post('add-barang', [BarangController::class, 'store']);
        Route::get('barang-edit/{slug}', [BarangController::class, 'edit']);
        Route::post('barang-edit/{slug}', [BarangController::class, 'update']);
        Route::get('barang-delete/{slug}', [BarangController::class, 'delete']);
        Route::get('barang-delete/{slug}', [BarangController::class, 'destroy']);
        
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted', [CategoryController::class, 'itemterhapus']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);
        
        Route::get('users', [UserController::class, 'index']);
        Route::get('registed-users', [UserController::class, 'registedUsers']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-delete/{slug}', [UserController::class, 'delete']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);

        Route::get('peminjaman', [PeminjamanController::class, 'index']);
        Route::post('peminjaman', [PeminjamanController::class, 'store']);
        
        Route::get('riwayat', [RiwayatController::class, 'index']);

        Route::get('pengembalian', [PeminjamanController::class, 'pengembalian']);
        Route::post('pengembalian', [PeminjamanController::class, 'simpanPengembalian']);
    });
});