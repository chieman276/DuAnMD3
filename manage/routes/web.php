<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserGroupController;
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

Route::get('/index', function () {
    return view('welcome');
  
})->name('index');

// Route::get('/manage', function() {
//     return view('admin.layouts.master');

// });

// Route::get('/logins', function() {
//     return view('admin.users.login');

// });

Route::group(['prefix' => 'admin'], function () {
    Route::resource('userGroups', UserGroupController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('productCategories', ProductCategoryController::class);
});


Route::resource('branches', BranchController::class);
Route::get('search', [BranchController::class])->name('branches.search');
