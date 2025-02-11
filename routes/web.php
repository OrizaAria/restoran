<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

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



route::get('/', [StaffController::class, 'home']);
route::get('/home', [StaffController::class, 'index'])->name('home');

route::get('/create_menu', [StaffController::class, 'create_menu']);
route::post('/tambah_menu', [StaffController::class, 'tambah_menu']);

Route::get('/data_menu', [StaffController::class, 'data_menu'])->name('data_menu');

route::get('/menu_update/{id}', [StaffController::class, 'menu_update']);
route::post('/edit_menu/{id}', [StaffController::class, 'edit_menu']);

route::get('/menu_delete/{id}', [StaffController::class, 'menu_delete']);

route::get('/pesanan_detail/{id}', [HomeController::class, 'pesanan_detail'])->name('pesanan_detail');
