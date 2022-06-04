<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\ProductController as AdminProductController;

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

Route::get('/', [WelcomeController::class, 'home'])->name('welcome');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', AdminCategoryController::class, ['names' => [
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'edit' => 'admin.categories.edit'
    ]]);

    Route::resource('products', AdminProductController::class, ['names' => [
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'edit' => 'admin.products.edit'
    ]]);
});

require __DIR__ . '/auth.php';
