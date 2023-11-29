<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
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


/* 
|--------------------------------------------------------------------------
| Auth & Landing routes
|-------------------------------------------------------------------------- 
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* 
|--------------------------------------------------------------------------
| Event routes
|-------------------------------------------------------------------------- 
*/

Route::resource('/events', EventController::class);
Route::get('/events_deleted', [EventController::class, 'showDeleted'])->name('events.showDeleted');
Route::put('/events/restore/{event}', [EventController::class, 'restore'])->name('events.restore')->withTrashed();



