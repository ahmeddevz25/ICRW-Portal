<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController as AdminAuth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ActivityLogController;
use App\Http\Controllers\Admin\CacheController;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/faculty', [HomeController::class, 'faculty'])->name('faculty');
Route::get('/workshop-details', [HomeController::class, 'workshopDetails'])->name('workshop.details');

// Subfolder /demo support for public frontend
Route::prefix('demo')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/faculty', [HomeController::class, 'faculty']);
    Route::get('/workshop-details', [HomeController::class, 'workshopDetails']);
});

/*
|--------------------------------------------------------------------------
| Administrative Executive SaaS Portal Routes
|--------------------------------------------------------------------------
*/

$registerAdminRoutes = function () {
    Route::get('/login', [AdminAuth::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuth::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuth::class, 'logout'])->name('logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/', function (\Illuminate\Http\Request $request) {
            $route = $request->is('demo*') ? 'demo.admin.dashboard' : 'admin.dashboard';
            return redirect()->route($route);
        });
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Users Management
        Route::prefix('users')->as('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index')->middleware('permission:users.view');
            Route::get('/create', [UserController::class, 'create'])->name('create')->middleware('permission:users.create');
            Route::post('/', [UserController::class, 'store'])->name('store')->middleware('permission:users.create');
            Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('permission:users.edit');
            Route::put('/{user}', [UserController::class, 'update'])->name('update')->middleware('permission:users.edit');
            Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy')->middleware('permission:users.delete');
            Route::patch('/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggle-status')->middleware('permission:users.edit');
        });

        // Roles Management
        Route::prefix('roles')->as('roles.')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('index')->middleware('permission:roles.view');
            Route::get('/create', [RoleController::class, 'create'])->name('create')->middleware('permission:roles.create');
            Route::post('/', [RoleController::class, 'store'])->name('store')->middleware('permission:roles.create');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit')->middleware('permission:roles.edit');
            Route::put('/{role}', [RoleController::class, 'update'])->name('update')->middleware('permission:roles.edit');
            Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy')->middleware('permission:roles.delete');
        });

        // Permissions Management
        Route::prefix('permissions')->as('permissions.')->group(function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index')->middleware('permission:permissions.view');
        });

        // Audit Trail Activity Logs
        Route::prefix('logs')->as('logs.')->group(function () {
            Route::get('/', [ActivityLogController::class, 'index'])->name('index')->middleware('permission:logs.view');
            Route::get('/{log}', [ActivityLogController::class, 'show'])->name('show')->middleware('permission:logs.view');
            Route::post('/clear', [ActivityLogController::class, 'clear'])->name('clear')->middleware('permission:logs.clear');
        });

        // System Cache Clear
        Route::post('/cache-clear', [CacheController::class, 'clear'])->name('cache.clear')->middleware('permission:system.cache_clear');
    });
};

Route::prefix('admin')->as('admin.')->group($registerAdminRoutes);
Route::prefix('demo/admin')->as('demo.admin.')->group($registerAdminRoutes);
