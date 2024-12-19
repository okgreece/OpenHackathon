<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminLoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');

    Route::post('/teams/join/{team}', [TeamController::class, 'join'])->name('teams.join');

    Route::get('/teams/{team}/panel', [TeamController::class, 'showPanel'])->name('teams.panel');

});

//ADMIN
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/panel', [AdminPanelController::class, 'index'])->name('admin.panel');
    Route::post('/logout', [AdminPanelController::class, 'logout'])->name('admin.logout');

    Route::delete('/delete-team/{team}', [AdminPanelController::class, 'deleteTeam'])->name('admin.delete.team');
    Route::delete('/delete-member/{member}', [AdminPanelController::class, 'deleteMember'])->name('admin.delete.member');
});

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login']);
