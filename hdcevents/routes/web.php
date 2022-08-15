<?php

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

use \App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events/create', [EventController::class, 'redirectToEventCreateForm'])->name('redirect.event.store')->middleware('auth');
Route::post('/events/create', [EventController::class, 'store'])->name('event.store')->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show'])->name('event.show');
Route::delete('events/{id}', [EventController::class, 'destroy'])->name('event.destroy')->middleware('auth');
Route::get('/events/update/{id}', [EventController::class, 'redirectToEventUpdateForm'])->name('redirect.event.update')->middleware('auth');
Route::put('/events/update/{id}', [EventController::class, 'update'])->name('event.update')->middleware('auth');

Route::get('/dashboard', [EventController::class, 'dashboard'])->name('event.dashboard')->middleware('auth');
