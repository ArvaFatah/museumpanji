<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/virtual-tour', function () {
    return view('virtual-tour');
});
Route::get('/profil', function () {
    return view('profil');
});


Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/',function () {
    return view('home');
})->name('home');
Route::get('/landing',function () {
    return view('landing');
})->name('landing');
Route::get('/portal',function () {
    return view('portal');
})->name('portal');
Route::get('/gallery',function () {
    return view('gallery');
})->name('gallery');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin-gallery');
Route::get('/admin/gallery/add', [GalleryController::class, 'addpage'])->name('admin-gallery-add');