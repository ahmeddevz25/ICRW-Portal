<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ActivityLogController;

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

// Direct Redirects to /admin/login
Route::get('admin', fn() => redirect()->route('login'));
Route::get('login', fn() => redirect()->route('login'));

// Guest Auth Routes
Route::controller(AdminController::class)->group(function () {
    Route::get('admin/login', 'LoginForm')->name('login');
    Route::post('admin/login', 'login')->name('login.submit');
});

// Authenticated Admin Routes
Route::middleware(['admin.auth'])->group(function () {

    // Dashboard, Logout & System Utilities
    Route::controller(AdminController::class)->group(function () {
        Route::get('admin/dashboard', 'index')->name('dashboard');
        Route::post('logout', 'logout')->name('logout');
        Route::match(['get', 'post'], 'clear-cache', 'clearcache')->name('clearcache');
        Route::get('site-down', 'siteDown')->name('site.down');
        Route::get('site-up', 'siteUp')->name('site.up');
    });

    // Users Management
    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:users.view');
        Route::post('/', 'store')->name('store')->middleware('permission:users.create');
        Route::put('/{id}', 'update')->name('update')->middleware('permission:users.edit');
        Route::match(['get', 'delete'], '/delete/{id}', 'destroy')->name('destroy')->middleware('permission:users.delete');
        Route::patch('/{user}/toggle-status', 'toggleStatus')->name('toggle-status')->middleware('permission:users.edit');
    });

    Route::prefix('admin/users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->middleware('permission:users.view');
        Route::post('/', 'store')->middleware('permission:users.create');
        Route::put('/{id}', 'update')->middleware('permission:users.edit');
        Route::match(['get', 'delete'], '/delete/{id}', 'destroy')->middleware('permission:users.delete');
    });

    // Roles Management (Supports both 'roles' and 'roles.index')
    Route::prefix('roles')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('roles')->middleware('permission:roles.view');
        Route::get('/list', 'index')->name('roles.index')->middleware('permission:roles.view');
        Route::post('/store', 'store')->name('roles.store')->middleware('permission:roles.create');
        Route::get('/{id}/edit', 'edit')->name('roles.edit')->middleware('permission:roles.edit');
        Route::match(['post', 'put'], '/{id}/update', 'update')->name('roles.update')->middleware('permission:roles.edit');
        Route::match(['get', 'delete'], '/{id}/delete', 'destroy')->name('roles.delete')->middleware('permission:roles.delete');
    });

    Route::prefix('admin/roles')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->middleware('permission:roles.view');
        Route::post('/store', 'store')->middleware('permission:roles.create');
        Route::match(['post', 'put'], '/{id}/update', 'update')->middleware('permission:roles.edit');
        Route::match(['get', 'delete'], '/{id}/delete', 'destroy')->middleware('permission:roles.delete');
    });

    // Permissions Management (Supports both 'permissions' and 'permissions.index')
    Route::prefix('permissions')->controller(PermissionController::class)->group(function () {
        Route::get('/', 'index')->name('permissions')->middleware('permission:permissions.view');
        Route::get('/list', 'index')->name('permissions.index')->middleware('permission:permissions.view');
        Route::post('/store', 'store')->name('permissions.store')->middleware('permission:permissions.create');
        Route::get('/edit/{id}', 'edit')->name('permissions.edit')->middleware('permission:permissions.edit');
        Route::match(['post', 'put'], '/update/{id}', 'update')->name('permissions.update')->middleware('permission:permissions.edit');
        Route::match(['get', 'delete'], '/delete/{id}', 'destroy')->name('permissions.delete')->middleware('permission:permissions.delete');
    });

    Route::prefix('admin/permissions')->controller(PermissionController::class)->group(function () {
        Route::get('/', 'index')->middleware('permission:permissions.view');
        Route::post('/store', 'store')->middleware('permission:permissions.create');
        Route::match(['post', 'put'], '/update/{id}', 'update')->middleware('permission:permissions.edit');
        Route::match(['get', 'delete'], '/delete/{id}', 'destroy')->middleware('permission:permissions.delete');
    });

    // Audit Trail Activity Logs
    Route::prefix('admin/logs')->name('logs.')->controller(ActivityLogController::class)->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:logs.view');
        Route::get('/{log}', 'show')->name('show')->middleware('permission:logs.view');
        Route::post('/clear', 'clear')->name('clear')->middleware('permission:logs.clear');
    });

    Route::prefix('logs')->controller(ActivityLogController::class)->group(function () {
        Route::get('/', 'index')->middleware('permission:logs.view');
        Route::get('/{log}', 'show')->middleware('permission:logs.view');
        Route::post('/clear', 'clear')->middleware('permission:logs.clear');
    });

    // Alias routes for testing and backwards compatibility
    Route::name('admin.')->group(function () {
        Route::get('admin/login-alias', fn() => redirect()->route('login'))->name('login');
        Route::get('admin/dash', [AdminController::class, 'index'])->name('dashboard');
        Route::get('admin/users-list', [UserController::class, 'index'])->name('users.index');
        Route::get('admin/roles-list', [RoleController::class, 'index'])->name('roles.index');
        Route::get('admin/perms-list', [PermissionController::class, 'index'])->name('permissions.index');
        Route::post('admin/cache-clear', [AdminController::class, 'clearcache'])->name('cache.clear');
    });
});

// Demo subfolder support (/demo/admin)
Route::prefix('demo')->group(function () {
    Route::get('admin', fn() => redirect('demo/admin/login'));
    Route::get('admin/login', [AdminController::class, 'LoginForm']);
    Route::post('admin/login', [AdminController::class, 'login']);

    Route::middleware(['admin.auth'])->group(function () {
        Route::get('admin/dashboard', [AdminController::class, 'index']);
        Route::get('admin/users', [UserController::class, 'index']);
        Route::get('admin/roles', [RoleController::class, 'index']);
        Route::get('admin/permissions', [PermissionController::class, 'index']);
        Route::get('admin/logs', [ActivityLogController::class, 'index']);
        Route::match(['get', 'post'], 'admin/clear-cache', [AdminController::class, 'clearcache']);
    });
});
