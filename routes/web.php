<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('patients',PatientController::class);
    Route::resource('drugs',DrugController::class);
    Route::resource('reservations',ReservationController::class);
    Route::put('reservations/{reservation}',[ReservationController::class,'didcome'])->name('reservations.didcome');
    Route::post('ordonnances/{ordonnance}',[OrdonnanceController::class,'downloadPdf'])->name('ordonnances.downloadPdf');
    Route::resource('services',ServiceController::class);
    Route::resource('ordonnances',OrdonnanceController::class);
    Route::resource('invoice',InvoiceController::class);
});

