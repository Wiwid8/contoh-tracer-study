<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\{
    QuestionnaireController,
};

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| PUBLIC (SEBELUM LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('index');
})->name('public');

// Rute untuk OTP
Route::get('/verify-otp', [OtpVerificationController::class, 'show'])
    ->name('otp.form');

Route::post('/verify-otp', [OtpVerificationController::class, 'verify'])
    ->name('otp.verify');

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('google.callback');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER (SEMUA ROLE)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ALUMNI
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:alumni'])->group(function () {

    // Dashboard alumni
    Route::get('/alumni/dashboard', function () {
        return view('alumni.dashboard');
    })->name('alumni.dashboard');

    // List kuesioner alumni
    Route::get('/alumni/kuesioner', function () {
        $questionnaires = \App\Models\Questionnaire::all();
        return view('alumni.kuesioner', compact('questionnaires'));
    })->name('alumni.kuesioner');

    // Isi kuesioner
    Route::get('/questionnaires/{id}/fill',
        [QuestionnaireController::class, 'fill']
    )->name('questionnaires.fill');

    Route::post('/questionnaires/{id}/submit',
        [QuestionnaireController::class, 'submit']
    )->name('questionnaires.submit');

});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // CRUD Kuesioner Admin
    Route::prefix('admin/questionnaires')->name('admin.questionnaires.')->group(function () {
        Route::get('/', [QuestionnaireController::class, 'index'])->name('index');
        Route::get('/create', [QuestionnaireController::class, 'create'])->name('create');
        Route::post('/', [QuestionnaireController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [QuestionnaireController::class, 'edit'])->name('edit');
        Route::put('/{id}', [QuestionnaireController::class, 'update'])->name('update');
        Route::delete('/{id}', [QuestionnaireController::class, 'destroy'])->name('destroy');
        Route::get('/{id}', [QuestionnaireController::class, 'show'])->name('show');
    });
});
