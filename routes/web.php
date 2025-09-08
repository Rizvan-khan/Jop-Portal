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
        Route::get('/dashboard', function () {
            return view('employer.dashboard');
        })->name('dashboard');

        Route::get('/company/create', [CompanyController::class, 'create'])->name('company.add.company');
        Route::post('/company/store', [CompanyController::class, 'store'])->name('company.add-company.store');
        Route::get('/company/{id}/edit', [CompanyController::class, 'edit'])->name('company.edit');
        Route::put('/company/{id}/update', [CompanyController::class, 'update'])->name('company.edit');
        Route::post('/logout', [EmployerAuthController::class, 'logout'])->name('auth.logout.submit');

        // add jobs
        Route::get('/job/create', [CompanyController::class, 'createJob'])->name('job.add-job');
        Route::post('/job/store', [CompanyController::class, 'storeJobs'])->name('job.add-job.store');
        Route::get('/dashboard', [CompanyController::class, 'getalljob'])
            ->name('dashboard');
        Route::get('/job/edit/{job_id}', [CompanyController::class, 'EditJob'])->name('job.edit-job');
        Route::post('/job/update/{id}', [CompanyController::class, 'UpdateJObs'])
            ->name('job.update');
        Route::delete('/job/delete/{job_id}', [CompanyController::class, 'DeleteJob'])
            ->name('job.delete');

        // jobs ends here




    });
});


Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', function () {
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
    Route::get('/dashboard', [ProfileController::class, 'getalljobs'])->name('dashboard');
    Route::get('/jobs', [ProfileController::class, 'getalljobs'])->name('jobs.list');
    Route::post('{job_id}/save/job', [ProfileController::class, 'saveJob'])->name('job.add');
    Route::post('{job_id}/remove/job', [ProfileController::class, 'removejobs'])->name('job.remove');
    Route::get('all/saved/job', [ProfileController::class, 'Getallsavejob'])->name('job.save-job');
    Route::get('{job_id}/job/application', [ProfileController::class, 'sendjobapplication'])->name('job.application');
    Route::post('{job_id}/job/application', [ProfileController::class, 'Jobreview'])->name('job.application');
    Route::get('profile', [ProfileController::class, 'userprofile'])->name('profile');
    Route::get('edit/contact', [ProfileController::class, 'editContact'])->name('profile.edit-contact');
    Route::put('edit/contact', [ProfileController::class, 'updateContact'])->name('profile.edit-contact');
    Route::get('edit/resume', [ProfileController::class, 'editResume'])->name('profile.edit-resume');
    Route::put('edit/resume', [ProfileController::class, 'updateResume'])->name('profile.edit-resume');
});

require __DIR__ . '/auth.php';
