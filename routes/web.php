<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\ProfilController;

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
Route::get('/gallery', [GalleryController::class, 'portalPage'])->name('gallery');


Route::group([
    'middleware' => 'auth',
], function ($router) {
    // dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profil
    Route::get('/admin/profil', [ProfilController::class, 'index'])->name('admin.profil');
    Route::post('/admin/profil/store', [ProfilController::class, 'store'])->name('admin.profil.store');
    
    // Gallery
    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::get('/admin/gallery/add', [GalleryController::class, 'addpage'])->name('admin.gallery.add');
    Route::post('/admin/gallery/add', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/admin/gallery/edit/{id}', [GalleryController::class, 'pageEdit'])->name('admin.gallery.edit');
    Route::post('/admin/gallery/edit/{id}', [GalleryController::class, 'postEdit'])->name('admin.gallery.postedit');
    Route::get('/admin/gallery/delete/{id}', [GalleryController::class, 'delete'])->name('admin.gallery.delete');
    
    // Virtual Tour
    Route::get('/admin/virtual', [GalleryController::class, 'index'])->name('admin.virtual');
    Route::get('/admin/virtual/add', [GalleryController::class, 'addpage'])->name('admin.virtual.add');
    Route::post('/admin/virtual/add', [GalleryController::class, 'store'])->name('admin.virtual.store');
    Route::get('/admin/virtual/edit/{id}', [GalleryController::class, 'pageEdit'])->name('admin.virtual.edit');
    Route::post('/admin/virtual/edit/{id}', [GalleryController::class, 'postEdit'])->name('admin.virtual.postedit');
    Route::get('/admin/virtual/delete/{id}', [GalleryController::class, 'delete'])->name('admin.virtual.delete');
    
    // Gallery
    Route::get('/admin/user', [UserManageController::class, 'index'])->name('admin.user');
    Route::get('/admin/user/add', [UserManageController::class, 'pageNew'])->name('admin.user.add');
    Route::post('/admin/user/add', [UserManageController::class, 'postNew'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}', [UserManageController::class, 'pageEdit'])->name('admin.user.edit');
    Route::post('/admin/user/edit/{id}', [UserManageController::class, 'postEdit'])->name('admin.user.postedit');
    Route::get('/admin/user/delete/{id}', [UserManageController::class, 'delete'])->name('admin.user.delete');
});