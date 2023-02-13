<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AppointmentController;
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

    // prescription section
    
    Route::get('appiontments',[AppointmentController::class,'appiontments'])->name('appiontments');
    Route::match(['get','post'],'appiontment/add',[AppointmentController::class,'appiontmentAdd'])->name('appiontment.add');
    Route::match(['get','post'],'appiontment/edit/{id?}',[AppointmentController::class,'appiontmentEdit'])->name('appiontment.edit');
    Route::get('appiontment/delete/{id?}',[AppointmentController::class,'appiontmentDel'])->name('appiontment.del');

    Route::get('prescriptions',[AppointmentController::class,'index'])->name('prescription');
    Route::match(['get','post'],'prescriptions/add',[AppointmentController::class,'add'])->name('prescription.add');
    Route::match(['get','post'],'prescriptions/edit/{id?}',[AppointmentController::class,'edit'])->name('prescription.edit');
    Route::get('prescriptions/delete/{id?}',[AppointmentController::class,'del'])->name('prescription.del');
    Route::get('prescriptions/generate-pdf/{id}', [AppointmentController::class, 'generatePDF'])->name('generate-pdf');
});

