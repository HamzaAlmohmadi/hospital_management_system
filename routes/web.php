<?php

use App\Http\Controllers\frontend\AppointmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




route::view('group-services','livewire.include_create')->name('group-services');



//############################# single_invoices route ##########################################
Route::view('single_invoices','livewire.single_invoices.index')->name('single_invoices');
Route::view('Print_single_invoices','livewire.single_invoices.print')->name('Print_single_invoices');
//############################# end single_invoices route #####################################



//############################# single_invoices route ##########################################
Route::view('group_invoices','livewire.Group_invoices.index')->name('group_invoices');
Route::view('group_Print_single_invoices','livewire.Group_invoices.print')->name('group_Print_single_invoices');
//############################# end single_invoices route ######################################


Route::resource('appointments', AppointmentController::class);


Route::get('appointments', [AppointmentController::class, 'getDoctors'])->name('appointments.getDoctors');

require __DIR__.'/auth.php';





