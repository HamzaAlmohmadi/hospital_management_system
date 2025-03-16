<?php

use App\Http\Controllers\frontend\dashboard\dootor\DiagnosisController;
use App\Http\Controllers\frontend\dashboard\dootor\DoctorDashboardController;
use App\Http\Controllers\frontend\dashboard\dootor\DoctorProfileController;
use App\Http\Controllers\frontend\dashboard\dootor\LaboratorieController;
use App\Http\Controllers\frontend\dashboard\dootor\PatientDetailsController;
use App\Http\Controllers\frontend\dashboard\dootor\RayController;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {

    return view('frontend.dashboard.doctor.dashboard');
})->name('dashboard');


Route::resource('profile', DoctorProfileController::class);
Route::post('profile',[DoctorProfileController::class, 'updateProfile'])->name('profile.updateProfile');





// Route::get('patient_details/{id}', [PatientDetailsController::class,'index'])->name('patient_details');

Route::get('patient_details/{id}', [PatientDetailsController::class, 'index'])->name('patient_details');


Route::get('newCases',[DoctorDashboardController::class,'newCases'])->name('newCases');
Route::get('underReviewCases',[DoctorDashboardController::class,'underReviewCases'])->name('underReviewCases');
Route::get('completedCases',[DoctorDashboardController::class,'completedCases'])->name('completedCases');




Route::post('diagnostics',[DiagnosisController::class,'createDiagnosis'])->name('diagnostic.createDiagnosis');
Route::get('diagnostic/{id}',[DiagnosisController::class,'getPatientRecords'])->name('diagnostic.getPatientRecords');
Route::post('diagnostic',[DiagnosisController::class,'addReview'])->name('diagnostic.addReview');


//############################# rays route ##########################################

Route::resource('rays', RayController::class);

//############################# end rays route ######################################


//############################# Laboratories route ##########################################
Route::resource('Laboratories', LaboratorieController::class);



//############################# end Laboratories route ######################################






