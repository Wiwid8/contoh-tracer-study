<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\{
    QuestionnaireController,
    ForumController,
    JobController,
    LeaderboardController,
    MentorshipController
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

// Lowongan kerja (lihat saja)
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

// Leaderboard (lihat)
Route::get('/leaderboard', [LeaderboardController::class, 'index'])
    ->name('leaderboard.index');

// Forum (lihat saja)
Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');

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

    // Forum (CRUD + comment)
    Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}/edit', [ForumController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{id}', [ForumController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{id}', [ForumController::class, 'destroy'])->name('forum.destroy');
    Route::post('/forum/{id}/comment', [ForumController::class, 'storeComment'])
        ->name('forum.comment');

    // Mentorship (request)
    Route::post('/mentorship/request',
        [MentorshipController::class, 'request']
    )->name('mentorship.request');
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
