<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Employer\Auth\EmployerAuthController;
use App\Http\Controllers\Employer\CompanyController;



Route::get('/', function () {
    return view('landing.landing');
})->name('landing');

// Employer Registration

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('employer')->name('employer.')->group(function () {

    Route::middleware('guest:employer')->group(function () {
       Route::get('/register', [EmployerAuthController::class, 'showEmployerRegister'])->name('auth.register');
Route::get('/login', [EmployerAuthController::class, 'showEmployerLogin'])->name('auth.login');
Route::post('/register', [EmployerAuthController::class, 'register'])->name('auth.register.submit');
Route::post('/login', [EmployerAuthController::class, 'login'])->name('auth.login.submit');

 

    });

    Route::middleware('auth:employer')->group(function () {
        Route::get('/dashboard', function() {
            return view('employer.dashboard');
        })->name('dashboard');

        Route::get('/company/create', [CompanyController::class, 'create'])->name('company.add.company');
    Route::post('/company/store', [CompanyController::class, 'store'])->name('company.add-company.store');

        Route::post('/logout', [EmployerAuthController::class, 'logout'])->name('auth.logout.submit');
    });

});


Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
