<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('houses', App\Http\Controllers\HouseController::class);
Route::resource('leases', App\Http\Controllers\LeaseController::class);
Route::get('payments/debtors', [App\Http\Controllers\PaymentController::class, 'debtors'])->name('payments.debtors');
Route::get('/debtors/pdf', [PaymentController::class, 'exportDebtorsPdf'])->name('debtors.pdf');
Route::resource('payments', App\Http\Controllers\PaymentController::class);
Route::resource('tenants', App\Http\Controllers\TenantController::class);
Route::resource('units', App\Http\Controllers\UnitController::class);


Route::get('/notifications', function () {
    $notifications = auth()->user()->notifications;

    return view('notifications.index', compact('notifications'));
})->name('notifications.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});



