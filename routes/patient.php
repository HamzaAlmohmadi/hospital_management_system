<?php

use App\Http\Controllers\frontend\dashboard\patient\PatientRecordsControlle;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {

    return view ('frontend.dashboard.patient.dashboard');
})->name('dashboard');


Route::get('invoices', [PatientRecordsControlle::class, 'indexInvoices'])->name('invoices');

Route::get('laboratories', [PatientRecordsControlle::class, 'indexLaboratoryResults'])->name('laboratories');

Route::get('showLaboratory/{id}', [PatientRecordsControlle::class, 'showLaboratoryResult'])->name('showLaboratoryResult');

Route::get('rays', [PatientRecordsControlle::class, 'indexRayResults'])->name('rays');

Route::get('showRay/{id}', [PatientRecordsControlle::class, 'showRayResult'])->name('showRayResult');

Route::get('payments', [PatientRecordsControlle::class, 'indexPayments'])->name('payments');