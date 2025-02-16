<?php
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Default redirect to tasks index
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Category resource routes (handles CRUD operations for categories)
Route::resource('categories', CategoryController::class);

// Task resource routes (handles CRUD operations for tasks)
Route::resource('tasks', TaskController::class)->middleware('auth');

// Custom route for toggling task completion
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');

// Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
