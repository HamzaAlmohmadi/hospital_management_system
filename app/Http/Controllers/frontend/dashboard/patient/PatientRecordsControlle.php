<?php

namespace App\Http\Controllers\frontend\dashboard\patient;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use App\Models\ReceiptAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientRecordsControlle extends Controller
{
    public function indexInvoices()
    {
        $invoices = Invoice::where('patient_id', Auth::user()->patient->id)->get();
        return view('frontend.dashboard.patient.invoices', compact('invoices'));
    }
    
    public function indexLaboratoryResults()
    {
        $laboratories = Laboratorie::where('patient_id', Auth::user()->patient->id)->get();
        return view('frontend.dashboard.patient.laboratories', compact('laboratories'));
    }
    
    public function showLaboratoryResult($id)
    {
        $laboratory = Laboratorie::findOrFail($id);
        if ($laboratory->patient_id !== Auth::user()->patient->id) {
            toastr()->error('لا يمكنك الوصول لهذه الصفحة');
            return redirect()->back();
      
        }
        return view('frontend.dashboard.patient.laboratories_show', compact('laboratory'));
    }
    
    public function indexRayResults()
    {
        $rays = Ray::where('patient_id', Auth::user()->patient->id)->get();
        return view('frontend.dashboard.patient.rays', compact('rays'));
    }
    
    public function showRayResult($id)
    {
        $ray = Ray::findOrFail($id);
        if ($ray->patient_id !== Auth::user()->patient->id) {
            toastr()->error('لا يمكنك الوصول لهذه الصفحة');
            return redirect()->back();
        }
        // dd($ray->employee);
        return view('frontend.dashboard.patient.rays_show', compact('ray'));
    }
    
    public function indexPayments()
    {
        $payments = ReceiptAccount::where('patient_id', Auth::user()->patient->id)->get();
        return view(' frontend.dashboard.patient.payments', compact('payments'));
    }
    
}
