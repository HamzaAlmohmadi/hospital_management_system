<?php

use App\Http\Controllers\backend\admin\AmbulanceController;
use App\Http\Controllers\backend\admin\AppointmentController;
use App\Http\Controllers\backend\admin\DoctorController;
use App\Http\Controllers\backend\admin\GroupInvoicesController;
use App\Http\Controllers\backend\admin\InsuranceController;
use App\Http\Controllers\backend\admin\LaboratorieEmployeeController;
use App\Http\Controllers\backend\admin\MessageController;
use App\Http\Controllers\backend\admin\PatientController;
use App\Http\Controllers\backend\admin\PaymentAccountController;
use App\Http\Controllers\backend\admin\RayEmployeeController;
use App\Http\Controllers\backend\admin\ReceiptAccountController;
use App\Http\Controllers\backend\admin\SectionController;
use App\Http\Controllers\backend\admin\SingleInvoiceController;
use App\Http\Controllers\backend\admin\SingleServiceController;
use App\Livewire\CreateGroupServices;
use Illuminate\Support\Facades\Route;









Route::get('/dashboard', function () {
    return view('backend.admin.dashboard');
})->name('dashboard');




Route::resource('sections', SectionController::class);

Route::resource('doctors', DoctorController::class);

Route::resource('patients', PatientController::class);


Route::resource('ambulances',AmbulanceController::class);

Route::resource('services',SingleServiceController::class);



Route::resource('insurances', InsuranceController::class);



Route::resource('ray_employees', RayEmployeeController::class);


Route::resource('laboratorie_employees', LaboratorieEmployeeController::class);



Route::resource('single_invoices', SingleInvoiceController::class);
Route::get('doctors/{doctorId}/section', [SingleInvoiceController::class, 'getSection']);
Route::get('/services/{serviceId}/price', [SingleInvoiceController::class, 'getPrice']);
Route::get('/invoices/calculateTotals', [SingleInvoiceController::class, 'calculateTotals'])->name('invoices.calculateTotals');
Route::get('/invoices/{id}/print', [SingleInvoiceController::class, 'print'])->name('invoices.print');




Route::resource('group_invoices', GroupInvoicesController::class);

Route::get('doctors/{doctorId}/section', [GroupInvoicesController::class, 'getSection']);

Route::get('groups/{group}/details', [GroupInvoicesController::class, 'getDetails']);




Route::resource('receipts', ReceiptAccountController::class);

Route::resource('payments', PaymentAccountController::class);

// راوت يضهر رصيد المتبقي للمريض  
Route::get('patient/balance/{id}', [PaymentAccountController::class, 'getBalance'])->name('patient.balance'); 


        // =======================================================route المواعيد========================================
        Route::get('appointments',[AppointmentController::class,'index'])->name('appointments.index');
        Route::put('appointments/approval/{id}',[AppointmentController::class,'approval'])->name('appointments.approval');
        Route::get('appointments/indexapproval',[AppointmentController::class,'indexapproval'])->name('appointments.indexapproval');

        // ======================================================= ُEnd route المواعيد========================================


// Route::get('/patient/balance/{id}', [PatientController::class, 'getPatientBalance'])->name('patient.balance');

//############################# end Patients route #####################################




    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/get-messages', [MessageController::class, 'getMessages'])->name('get-messages');
    Route::post('/send-message', [MessageController::class, 'sendMessage'])->name('send-message');



// Route::middleware('auth')->group(function() {
//     Route::get('/admin/messages', [MessageControlle::class, 'index'])->name('admin.messages.index');
//     Route::get('/admin/get-messages', [MessageController::class, 'getMessages'])->name('admin.get-messages');
//     Route::post('/admin/send-message', [MessageController::class, 'sendMessage'])->name('admin.send-message');
// });





require __DIR__.'/auth.php';