<?php

use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\AccountController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\ProposalController;
use App\Http\Controllers\Pages\PagesController;
use Illuminate\Support\Facades\Route;

// Pages
Route::get('/home', [DashboardController::class, 'dashboard'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

// Authentication
Route::prefix('auth')->group(function () {
    Route::get('/', function() {
        var_dump('auth');
    });
    // Register
    Route::get('/register', [RegisterController::class, 'registerForm'])->middleware(['guest'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    // Email Verify
    Route::get('/email/verify', [EmailController::class, 'verifyEmailForm'])->middleware('auth')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailController::class, 'verifyEmailNotice'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

    //Forgot Password (maintenance)
    Route::get('/forgot-password', [PasswordController::class, 'forgotPasswordForm'])->middleware(['guest'])->name('password.request');
    Route::post('/forgot-password', [PasswordController::class, 'forgotPassword'])->middleware(['guest'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordController::class, 'resetPasswordForm'])->middleware(['guest'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->middleware(['guest'])->name('password.update');

    //Login
    Route::get('/login', [LoginController::class, 'loginForm'])->middleware(['guest'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->middleware(['guest'])->name('login');
    
    //Logout
    Route::post('/logout', [LoginController::class, 'logout'])->middleware(['auth'])->name('logout');
});

// Dashboard
Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function() {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    
    // Proposal
    Route::resource('proposal', ProposalController::class);
    Route::post('/proposal/{id}/print', [ProposalController::class, 'print'])->name('proposal.print');
    Route::patch('/proposal/{id}/{status}', [ProposalController::class, 'approval'])->middleware(['role:supervisor,admin'])->name('proposal.approval');
    
    // Account
    Route::resource('account', AccountController::class);
});