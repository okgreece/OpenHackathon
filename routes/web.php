<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\ResetPasswordController;
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
Route::get('/mentors/register', [MentorController::class, 'showRegisterForm'])->name('mentors.register.form');
Route::post('/mentors/register', [MentorController::class, 'register'])->name('mentors.register');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/mentors/login', [MentorController::class, 'showLoginForm'])->name('mentors.login');
Route::post('/mentors/login', [MentorController::class, 'login']);

Route::get('/about', [AboutController::class, 'index']);
Route::get('/about', [AboutController::class, 'aboutShowPanel'])->name('about');

Route::middleware(['auth:mentor'])->group(function () {
    Route::get('/mentors/dashboard', [MentorController::class, 'dashboard'])->name('mentors.dashboard');
    Route::post('/mentor/accept/{team}', [MentorController::class, 'accept'])->name('mentor.accept');
    Route::post('/mentor/decline/{team}', [MentorController::class, 'decline'])->name('mentor.decline');
    Route::post('/mentors/logout', [MentorController::class, 'logout'])->name('mentors.logout');
});

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('reset.password.form');

Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('reset.password');

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
    
    Route::post('/teams/{team}/invite', [TeamController::class, 'send'])->name('invitations.send');
    Route::post('/invitations/{invitation}/cancel', [TeamController::class, 'cancel'])->name('invitations.cancel');
    Route::post('/invitations/{invitation}/reject', [TeamController::class, 'reject'])->name('invitations.reject');
    Route::post('/team/select-mentor', [TeamController::class, 'selectMentor'])->name('team.selectMentor');
});

//ADMIN
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/panel', [AdminPanelController::class, 'index'])->name('admin.panel');
    Route::post('/logout', [AdminPanelController::class, 'logout'])->name('admin.logout');

    Route::delete('admin/delete-team/{team}', [AdminPanelController::class, 'deleteTeam'])->name('admin.delete.team');
    Route::delete('/admin/delete-member/{member}', [AdminPanelController::class, 'deleteMember'])->name('admin.delete.member');
    Route::post('/admin/update-end-date/{id}', [AdminPanelController::class, 'updateEndDate'])->name('admin.updateEndDate');
    Route::post('/admin/toggle-registration', [AdminPanelController::class, 'toggleRegistration'])->name('admin.toggleRegistration');
    Route::post('/admin/assign-user-to-team', [AdminPanelController::class, 'assignUserToTeam'])->name('admin.assignUserToTeam');

    Route::get('/admin/mentors', [AdminPanelController::class, 'index'])->name('admin.mentors');
    Route::post('/admin/mentors', [AdminPanelController::class, 'store'])->name('admin.mentors.store');
    Route::post('/admin/update-password/{mentor}', [AdminPanelController::class, 'updatePassword'])->name('admin.mentor.updatePassword');
});

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);

// Ομάδες και Αιτήσεις
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {

    // Διαχείριση αιτήσεων ομάδων
    Route::post('/team-requests/{id}/approve', [AdminPanelController::class, 'approveRequest'])->name('admin.team-requests.approve');
    Route::post('/team-requests/{id}/reject', [AdminPanelController::class, 'rejectRequest'])->name('admin.team-requests.reject');

    // Διαχείριση ομάδων
    Route::delete('/delete-team/{team}', [AdminPanelController::class, 'deleteTeam'])->name('delete.team');

    // Διαχείριση μελών
    Route::delete('/delete-member/{member}', [AdminPanelController::class, 'deleteMember'])->name('delete.member');
    
    // Αποσύνδεση
    Route::post('admin/logout', [AdminPanelController::class, 'logout'])->name('admin.logout');
});

Route::middleware('auth')->group(function() {
    Route::post('/teams/{teamId}/invite', [TeamInvitationController::class, 'sendInvitation'])->name('teams.invite');
    Route::post('/invitations/{invitationId}/accept', [TeamInvitationController::class, 'acceptInvitation'])->name('invitations.accept');
    Route::post('/invitations/{invitationId}/reject', [TeamInvitationController::class, 'rejectInvitation'])->name('invitations.reject');
});