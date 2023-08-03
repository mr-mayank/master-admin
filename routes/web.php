<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware(['auth', 'usertype'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::get('/role-reg', [DashboardController::class, 'registered']);
    
    Route::get('/role-edit/{id}', [DashboardController::class, 'edit']);
    
    Route::put('/role-reg-update/{id}', [DashboardController::class, 'updaterole']);
    
    Route::delete('/role-delete/{id}', [DashboardController::class, 'deleterole']);
    
    Route::get('/register', function () {
        return view('admin.add-user');
    });
    
    Route::post('/add-user', [DashboardController::class, 'registerUser']);
});



// Route::get('/role-reg', [DashboardController::class, 'registered']);

// Route::get('/role-edit/{id}', [DashboardController::class, 'edit']);

// Route::put('/role-reg-update/{id}', [DashboardController::class, 'updaterole']);

// Route::delete('/role-delete/{id}', [DashboardController::class, 'deleterole']);

// Route::get('/register', function () {
//     return view('admin.add-user');
// });

// Route::post('/add-user', [DashboardController::class, 'registerUser']);





