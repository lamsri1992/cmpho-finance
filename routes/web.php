<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('income')->group(function () {
    Route::get('/list', [IncomeController::class, 'index'])->name('inc.index');
    Route::get('/list/{id}', [IncomeController::class, 'show'])->name('inc.show');
    Route::get('/report', [IncomeController::class, 'report'])->name('inc.report');
    Route::post('/create', [IncomeController::class, 'store'])->name('inc.store');
});

Route::prefix('data/bank')->group(function () {
    Route::get('/', [BankController::class, 'index'])->name('bank.index');
});

Route::prefix('data/type')->group(function () {
    Route::get('/', [TypeController::class, 'index'])->name('bank.type');
});

Route::prefix('data/employee')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('emp.index');
    Route::post('/create', [EmployeeController::class, 'store'])->name('emp.store');
    Route::post('/update/{id}', [EmployeeController::class, 'update'])->name('emp.update');
    Route::post('/account/create', [EmployeeController::class, 'store_account'])->name('emp.store.account');
    Route::get('/status/changed', [EmployeeController::class, 'changed'])->name('emp.changed');
    Route::get('/account/changed', [EmployeeController::class, 'acc_changed'])->name('acc.changed');
    Route::get('/account/{id}', [EmployeeController::class, 'account_show'])->name('emp.account');
    Route::post('/account/update/{id}', [EmployeeController::class, 'account_update'])->name('emp.acc_update');
    // Route::post('/account/{id}', [EmployeeController::class, 'account'])->name('emp.account');
    Route::get('/{id}', [EmployeeController::class, 'show'])->name('emp.show');
});

Route::prefix('data/hospital')->group(function () {
    Route::get('/', [HospitalController::class, 'index'])->name('hospital.index');
    Route::get('/{id}', [HospitalController::class, 'show'])->name('hospital.show');
});

Route::prefix('setting/userslist')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/api.php';
