<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', [LoginController::class, 'Index'])->name('index');
Route::post('login', [LoginController::class, 'Login'])->name('user.login');

Route::get('register', [LoginController::class, 'ShowRegistration'])->name('show');
Route::post('register', [LoginController::class, 'Register'])->name('user.register');

Route::get('profile', [LoginController::class, 'ShowProfile'])->name('user.profile');
Route::post('profile_update', [LoginController::class, 'ProfileUpdate'])->name('user.update');

Route::get('logout', [LoginController::class, 'LogOut'])->name('user.logout');

// section 2
Route::get('users_list', [LoginController::class, 'UsersList'])->name('listshow');
Route::get('user-single-view', [LoginController::class, 'UserSingleView'])->name('single.view');


Route::get('add-project', [LoginController::class, 'AddProject'])->name('project.view');
Route::post('insert-project', [LoginController::class, 'InsertProject'])->name('project.insert');
Route::get('list-table-join', [LoginController::class, 'Jointable'])->name('join.list');
