<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\TeamInvitationController;


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
    Route::post('/team-requests', [TeamController::class, 'store'])->name('team-requests.store');
    Route::get('/admin/team-requests', [AdminPanelController::class, 'viewTeamRequests'])->name('admin.team-requests');
    // Route::post('/admin/team-requests/{id}/approve', [AdminPanelController::class, 'approveRequest'])->name('admin.team-requests.approve');
    // Route::post('/admin/team-requests/{id}/reject', [AdminPanelController::class, 'rejectRequest'])->name('admin.team-requests.reject');
    Route::get('/hackathon-phases', [AdminPanelController::class, 'index'])->name('admin.hackathon-phases.index');
    Route::post('/hackathon-phases/update/{id}', [AdminPanelController::class, 'update'])->name('admin.hackathon-phases.update');    

    Route::post('/teams/join/{team}', [TeamController::class, 'join'])->name('teams.join');

    Route::get('/teams/{team}/panel', [TeamController::class, 'showPanel'])->name('teams.panel');

    Route::post('/team/{id}/complete-phase', [TeamController::class, 'completePhase'])->name('team.completePhase');


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

// Ομάδες και Αιτήσεις
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Διαχείριση αιτήσεων ομάδων
    Route::post('/team-requests/{id}/approve', [AdminPanelController::class, 'approveRequest'])->name('team-requests.approve');
    Route::post('/team-requests/{id}/reject', [AdminPanelController::class, 'rejectRequest'])->name('team-requests.reject');

    // Διαχείριση ομάδων
    Route::delete('/delete-team/{team}', [AdminPanelController::class, 'deleteTeam'])->name('delete.team');

    // Διαχείριση μελών
    Route::delete('/delete-member/{member}', [AdminPanelController::class, 'deleteMember'])->name('delete.member');
    
    // Αποσύνδεση
    Route::post('/logout', [AdminPanelController::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function() {
    Route::post('/teams/{teamId}/invite', [TeamInvitationController::class, 'sendInvitation'])->name('teams.invite');
    Route::post('/invitations/{invitationId}/accept', [TeamInvitationController::class, 'acceptInvitation'])->name('invitations.accept');
    Route::post('/invitations/{invitationId}/reject', [TeamInvitationController::class, 'rejectInvitation'])->name('invitations.reject');
});