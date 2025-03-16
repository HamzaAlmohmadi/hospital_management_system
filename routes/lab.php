<?php

use App\Http\Controllers\frontend\dashboard\LabEmployee\LabInvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {

    return view('frontend.dashboard.lab_employee.dashboard');
})->name('dashboard');




Route::resource('invoices_lab_employe',LabInvoiceController::class);


Route::get('completed_invoice', [LabInvoiceController::class, 'completed_invoices'])->name('completed_invoices');