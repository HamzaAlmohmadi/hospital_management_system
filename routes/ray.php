<?php

use App\Http\Controllers\frontend\dashboard\RayEmployee\RayInvoiceController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {

    return view ('frontend.dashboard.ray_employee.dashboard');
})->name('dashboard');


Route::get('completed_invoice', [RayInvoiceController::class, 'completed_invoices'])->name('completed_invoices');

Route::resource('invoices_ray_employe',RayInvoiceController::class);


