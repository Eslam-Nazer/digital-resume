<?php

use App\Http\Controllers\CvController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cv/download', [CvController::class, 'download'])->name('cv.download');
Route::resource('cv', CvController::class);
