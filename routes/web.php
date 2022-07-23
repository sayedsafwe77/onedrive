<?php

use Illuminate\Support\Facades\Route;
use App\Integrations\MicrosoftGraph;
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


Route::middleware('auth:web')->group( function() {
    Route::get('/projects/user/{id}', [App\Http\Controllers\ProjectController::class,'user'])->name('projects.user');
    Route::get('/projects/selectAction/{id}', [App\Http\Controllers\ProjectController::class,'selectAction'])->name('projects.select.action');
});
Route::middleware('auth:web,admin')->group( function() {
    Route::get('/',[App\Http\Controllers\ProjectController::class,'index']);
    Route::get('/qr-code',[App\Http\Controllers\QrcodeController::class,'view'])->name('add-qr-code');
    Route::get('/callback', [App\Http\Controllers\AuthController::class, 'callback']);
    Route::get('/signout', [App\Http\Controllers\AuthController::class, 'signout']);
    Route::get('/calendar', [App\Http\Controllers\CalendarController::class, 'calendar']);
    Route::get('/onedrive', [App\Http\Controllers\OneDriveController::class, 'onedrive']);
    Route::get('/calendar/new', [App\Http\Controllers\CalendarController::class, 'getNewEventForm']);
    Route::post('/calendar/new', [App\Http\Controllers\CalendarController::class, 'createNewEvent']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/signin', [App\Http\Controllers\AuthController::class , 'signin'])->name('azure.login');

Auth::routes();

