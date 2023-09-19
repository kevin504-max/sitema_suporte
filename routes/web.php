<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\frontend\FrontEndController;
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

Route::get('/', [FrontEndController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('support-page', [FrontEndController::class, 'supportPage'])->name('support-page');
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
});
