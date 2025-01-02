<?php

use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*==============================================================================patients Auth==============================================================================*/ 
Route::post('patients/register', [AuthController::class, 'patientRegister'])->name('patients.register');
Route::post('patients/login', [AuthController::class, 'patientlogin'])->name('patients.login');

/*==============================================================================doctors Auth==============================================================================*/
Route::post('doctors/login', [AuthController::class, 'doctorLogin'])->name('doctors.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('patients/logout', [AuthController::class, 'patientlogout'])->name('patients.logout');
    Route::post('doctors/logout', [AuthController::class, 'doctorLogout'])->name('doctors.logout');
});