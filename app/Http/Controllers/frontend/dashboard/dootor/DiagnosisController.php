<?php

namespace App\Http\Controllers\frontend\dashboard\dootor;

use App\Http\Controllers\Controller;
use App\Models\Diagnostic;
use App\Models\Invoice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DiagnosisController extends Controller
{
        // إضافة تشخيص جديد
        public function createDiagnosis(Request $request)
        {
            DB::beginTransaction();
            try {
                $this->updateInvoiceStatus($request->invoice_id, 3);
    
                Diagnostic::create([
                    'date' => now()->format('Y-m-d'),
                    'diagnosis' => $request->diagnosis,
                    'medicine' => $request->medicine,
                    'invoice_id' => $request->invoice_id,
                    'patient_id' => $request->patient_id,
                    'doctor_id' => $request->doctor_id,
                ]);
            
    
                DB::commit();
                toastr()->success('تم اضافة تشخيص بنجاح  !');
                return redirect()->back();
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }

        
        // عرض سجل المرضى
        public function getPatientRecords($patientId)
        {
            $patientRecords = Diagnostic::where('patient_id', $patientId)->get();
            return view('dashboard.doctor.invoices.patient_record', compact('patientRecords'));
        }
    
        // إضافة مراجعة
        public function addReview(Request $request)
        {
            DB::beginTransaction();
            try {
                $this->updateInvoiceStatus($request->invoice_id, 2);
    
                Diagnostic::create([
                    'date' => now()->format('Y-m-d'),
                    'review_date' => now(),
                    'diagnosis' => $request->diagnosis,
                    'medicine' => $request->medicine,
                    'invoice_id' => $request->invoice_id,
                    'patient_id' => $request->patient_id,
                    'doctor_id' => $request->doctor_id,
                ]);
    
                DB::commit();
                toastr()->success('تم إضافة المراجعة بنجاح');
                return redirect()->back();
            } catch (Exception $e) {
                DB::rollBack();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
    
        // تحديث حالة الفاتورة
        private function updateInvoiceStatus($invoiceId, $status)
        {
            $invoice = Invoice::findOrFail($invoiceId);
            $invoice->update(['invoice_status' => $status]);
        }
}






