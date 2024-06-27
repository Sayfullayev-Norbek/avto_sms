<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendController;
use App\Http\Controllers\CompanyController;

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



Route::get('/', [CompanyController::class, 'create'])->name('create');
Route::post('/', [CompanyController::class, 'tariffStore'])->name('tariffStore');


Route::post('/send-sms', [SendController::class, 'sendSms'])->name('send.sms');
