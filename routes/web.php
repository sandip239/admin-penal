<?php

use App\Http\Controllers\authcontroller;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;

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


Route::get('register',[authcontroller::class,'registerView'])->name('register');
Route::post('register',[authcontroller::class,'register'])->name('user-register');
Route::get('login',[authcontroller::class,'loginView'])->name('loginview');
Route::post('login',[authcontroller::class,'login'])->name('login');


Route::get('deshboard',[usercontroller::class,'deshboard'])->name('deshboard');
Route::get('userregister',[usercontroller::class,'index'])->name('userregister');
Route::post('userregister',[usercontroller::class,'userRegister'])->name('userdataregister');


Route::get('edit/{id}',[usercontroller::class,'edit'])->name('edit');
Route::post('update-data',[usercontroller::class,'updateData'])->name('updateData');


Route::post('delete-users',[usercontroller::class,'deleteUsers'])->name('delete-users');


Route::get('/users',[usercontroller::class,'yajara'])->name('yajara-table');
Route::post('delete-selected',[usercontroller::class,'deleteSelected'])->name('delete-selected');

// Route::post('/delete-selected', 'UserController@deleteSelected')->name('delete-selected');







