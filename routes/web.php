<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;

Route::get('/', [BirthdayController::class, 'index'])->name('home');

// Admin Auth Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Guarded Admin Dashboard Panel Routes
Route::middleware(['admin.auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/settings', [AdminDashboardController::class, 'updateSettings'])->name('admin.settings.update');

    // Reasons CRUD
    Route::post('/reasons', [AdminDashboardController::class, 'storeReason'])->name('admin.reasons.store');
    Route::put('/reasons/{reason}', [AdminDashboardController::class, 'updateReason'])->name('admin.reasons.update');
    Route::delete('/reasons/{reason}', [AdminDashboardController::class, 'destroyReason'])->name('admin.reasons.destroy');

    // Memories CRUD (Gallery)
    Route::post('/memories', [AdminDashboardController::class, 'storeMemory'])->name('admin.memories.store');
    Route::post('/memories/{memory}', [AdminDashboardController::class, 'updateMemory'])->name('admin.memories.update');
    Route::delete('/memories/{memory}', [AdminDashboardController::class, 'destroyMemory'])->name('admin.memories.destroy');

    // Milestones CRUD (Timeline)
    Route::post('/milestones', [AdminDashboardController::class, 'storeMilestone'])->name('admin.milestones.store');
    Route::put('/milestones/{milestone}', [AdminDashboardController::class, 'updateMilestone'])->name('admin.milestones.update');
    Route::delete('/milestones/{milestone}', [AdminDashboardController::class, 'destroyMilestone'])->name('admin.milestones.destroy');

    // Quizzes CRUD
    Route::post('/quizzes', [AdminDashboardController::class, 'storeQuiz'])->name('admin.quizzes.store');
    Route::put('/quizzes/{quiz}', [AdminDashboardController::class, 'updateQuiz'])->name('admin.quizzes.update');
    Route::delete('/quizzes/{quiz}', [AdminDashboardController::class, 'destroyQuiz'])->name('admin.quizzes.destroy');

    // Hero Section CRUD
    Route::post('/hero', [AdminDashboardController::class, 'storeHero'])->name('admin.hero.store');
    Route::post('/hero/{hero}', [AdminDashboardController::class, 'updateHero'])->name('admin.hero.update');
    Route::delete('/hero/{hero}', [AdminDashboardController::class, 'destroyHero'])->name('admin.hero.destroy');
});
