<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/messages', [App\Http\Controllers\HomeController::class, 'store'])->name('messages.store');
Route::get('messages/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('messages.show');

Route::get('notificaciones', [App\Http\Controllers\NotificationsController::class, 'index'])->name('notifications.index');

Route::patch('notificaciones/{id}', [App\Http\Controllers\NotificationsController::class, 'read'])->name('notifications.read');
Route::delete('notificaciones/{id}', [App\Http\Controllers\NotificationsController::class, 'destroy'])->name('notifications.destroy');