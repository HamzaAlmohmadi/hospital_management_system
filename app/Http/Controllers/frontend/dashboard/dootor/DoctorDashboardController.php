<?php

namespace App\Http\Controllers\frontend\dashboard\dootor;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorDashboardController extends Controller
{
        // عرض الحالات الجديدة
        public function newCases()
        {
            $invoices = Invoice::where('doctor_id', Auth::user()->doctor->id)->where('invoice_status', 1)->get();

            return view('frontend.dashboard.doctor.invoices.index', compact('invoices'));
        }
    
        // عرض الحالات تحت الإجراء
        public function underReviewCases()
        {
            $invoices = Invoice::where('doctor_id',Auth::user()->doctor->id)->where('invoice_status', 2)->get();
            return view('frontend.dashboard.doctor.invoices.under_review', compact('invoices'));
        }
    
        // عرض الحالات المكتملة
        public function completedCases()
        {
            $invoices = Invoice::where('doctor_id',  Auth::user()->doctor->id)->where('invoice_status', 3)->get();
            return view('frontend.dashboard.doctor.invoices.completed', compact('invoices'));
        }

        

            
        
}


