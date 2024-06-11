<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\BulletinController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ActivityController;

use App\Http\Controllers\profileController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//result
Route::resource('results', ResultController::class);

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


Route::get('/profile', [profileController::class, 'index'])->name('profile.index');
Route::get('/profile/create',[profileController::class, 'create'])->name('profile.create');
Route::get('/store',[profileController::class, 'create'])->name('profile.create');
Route::post('/store',[profileController::class, 'store'])->name('profile.store');
//Route::delete('LabAsset/{assetDetail}', [profileController::class, 'destroy'])->name('assets.destroy');

Route::get('kafa-activities', [ActivityController::class, 'index'])->name('activities.index');
