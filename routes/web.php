<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\BulletinController;
<<<<<<< HEAD
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActivityController;
=======
use App\Http\Controllers\profileController;
>>>>>>> 679a697df8d555dee1a0944e18e4a20bd49e111a

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//result
Route::resource('results', ResultController::class);
<<<<<<< HEAD
//bulletin
Route::get('/bulletin/admin', [BulletinController::class, 'indexAdmin'])->name('bulletin.indexBulletinAdmin');
Route::get('/bulletin', [BulletinController::class, 'index'])->name('bulletin.indexBulletin');
Route::get('/bulletin/admin/create', [BulletinController::class, 'create'])->name('bulletin.createBulletin');
Route::post('/bulletin/admin/create/store', [BulletinController::class, 'store'])->name('bulletin.store');
Route::get('/bulletin/admin/edit/{id}', [BulletinController::class, 'edit'])->name('bulletin.updateBulletin');
Route::post('/bulletin/admin/update/{id}', [BulletinController::class, 'update'])->name('bulletin.update');
Route::delete('/bulletin/admin/delete/{id}', [BulletinController::class, 'destroy'])->name('bulletin.destroy');
// Route::get('/bulletin/admin/edit', [BulletinController::class, 'edit'])->name('bulletin.updateBulletin');
// Route::get('/bulletin/admin/delete', [BulletinController::class, 'delete'])->name('bulletin.deleteBulletin');
//asing kan ye
Route::get('profile', [StudentController::class, 'index'])->name('profile.index');
=======

Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
>>>>>>> 679a697df8d555dee1a0944e18e4a20bd49e111a
Route::get('kafa-activities', [ActivityController::class, 'index'])->name('activities.index');
