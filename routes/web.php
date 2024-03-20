<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('category', CategoryController::class);
    // Route::get('category/{category}/product/{product}',[ CategoryController::class, 'show'])->name('admin.category.product.show')
    // users routes
    Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::get('/user', App\Http\Livewire\Admin\User\Index::class)->name('admin.user.index');
    // Route::get('user/create', App\Http\Livewire\Admin\User\Create::class)->name('admin.user.create');

    // product route
    Route::get('/products', App\Http\Livewire\Admin\Product\Index::class)->name('admin.product.index');
    Route::get('/products/create', App\Http\Livewire\Admin\Product\Create::class)->name('admin.product.create');
});

Route::prefix('/')->middleware(['auth', 'isCustomer'])->group(function () {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
