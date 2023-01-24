<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Auth::routes(['verify' => true]);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/profile', function () {
    return view('auth.profile');
})->middleware(['auth', 'verified'])->name('profile');

Route::get('/', function () {
    return redirect()->route('home');
});
//Auth::routes(['register' => false]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'verified'])->group(function (){
    Route::resource('admin',DashboardController::class);
    Route::resource('patient',PatientController::class);
    Route::resource('doctor',DoctorController::class);
    Route::resource('staff',StaffController::class);
    // Route::resource('profile',StaffController::class);
});

