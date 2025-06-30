<?php

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
Route::resource('payments', App\Http\Controllers\PaymentController::class);
Route::resource('tenants', App\Http\Controllers\TenantController::class);
Route::resource('units', App\Http\Controllers\UnitController::class);