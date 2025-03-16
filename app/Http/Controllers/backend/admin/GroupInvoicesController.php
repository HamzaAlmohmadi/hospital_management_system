<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Group;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupInvoicesController extends Controller
{

        // عرض قائمة الفواتير المجمعة
        public function index()
        {
            $group_invoices = Invoice::where('invoice_type', 2)->get();
            $patients = Patient::all();
            $doctors = Doctor::all();
            $groups = Group::all();
            return view('backend.admin.group_invoices.index', compact('group_invoices', 'patients', 'doctors', 'groups'));
        }
    
        // عرض نموذج إنشاء فاتورة مجمعة
        public function create()
        {
            $patients = Patient::all();
            $doctors = Doctor::all();
            $groups = Group::all();
            return view('backend.admin.group_invoices.create', compact('patients', 'doctors', 'groups'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:doctors,id',
                'Group_id' => 'required|exists:groups,id',
                'price' => 'required|numeric',
                'discount_value' => 'numeric',
                'tax_rate' => 'numeric',
                'type' => 'required|in:1,2', // 1: نقدي, 2: آجل
            ]);
        
            try {
                // إنشاء الفاتورة
                $invoice = new Invoice();
                $invoice->invoice_type = 2; // فاتورة مجمعة
                $invoice->invoice_date = date('Y-m-d');
                $invoice->patient_id = $request->patient_id;
                $invoice->doctor_id = $request->doctor_id;
                $invoice->Group_id = $request->Group_id;
                $invoice->section_id = $request->section_id; // استخدام section_id مباشرة
                $invoice->price = $request->price;
                $invoice->discount_value = $request->discount_value;
                $invoice->tax_rate = $request->tax_rate;
                $invoice->tax_value = ($request->price - $request->discount_value) * ($request->tax_rate / 100);
                $invoice->total_with_tax = $request->price - $request->discount_value + $invoice->tax_value;
                $invoice->type = $request->type;
                $invoice->save();
        
                // إدارة الحسابات المالية
                if ($request->type == 1) { // نقدي
                    $fund_account = new FundAccount();
                    $fund_account->date = date('Y-m-d');
                    $fund_account->invoice_id = $invoice->id;
                    $fund_account->Debit = $invoice->total_with_tax;
                    $fund_account->credit = 0.00;
                    $fund_account->save();
                } else { // آجل
                    $patient_account = new PatientAccount();
                    $patient_account->date = date('Y-m-d');
                    $patient_account->invoice_id = $invoice->id;
                    $patient_account->patient_id = $invoice->patient_id;
                    $patient_account->Debit = $invoice->total_with_tax;
                    $patient_account->credit = 0.00;
                    $patient_account->save();
                }
        
                toastr('تم حفظ الفاتورة بنجاح', 'success');
                return redirect()->route('admin.group_invoices.index');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
    
        // عرض نموذج تعديل فاتورة مجمعة
        public function edit($id)
        {
            $invoice = Invoice::findOrFail($id);
            $patients = Patient::all();
            $doctors = Doctor::all();
            $groups = Group::all();
            return view('backend.admin.group_invoices.edit', compact('invoice', 'patients', 'doctors', 'groups'));
        }
    
        // تحديث فاتورة مجمعة
        public function update(Request $request, $id)
        {
            $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:doctors,id',
                'Group_id' => 'required|exists:groups,id',
                'price' => 'required|numeric',
                'discount_value' => 'numeric',
                'tax_rate' => 'numeric',
                'type' => 'required|in:1,2', // 1: نقدي, 2: آجل
            ]);
        
            try {
                $invoice = Invoice::findOrFail($id);
                $invoice->patient_id = $request->patient_id;
                $invoice->doctor_id = $request->doctor_id;
                $invoice->Group_id = $request->Group_id;
                $invoice->section_id = $request->section_id; // استخدام section_id مباشرة
                $invoice->price = $request->price;
                $invoice->discount_value = $request->discount_value;
                $invoice->tax_rate = $request->tax_rate;
                $invoice->tax_value = ($request->price - $request->discount_value) * ($request->tax_rate / 100);
                $invoice->total_with_tax = $request->price - $request->discount_value + $invoice->tax_value;
                $invoice->type = $request->type;
                $invoice->save();
        
                toastr('تم تحديث الفاتورة بنجاح', 'success');
                return redirect()->route('admin.group_invoices.index');
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
    
        // حذف فاتورة مجمعة
        public function destroy($id)
        {
            try {
                Invoice::destroy($id);
                return response()->json(['status' => 'success', 'message' => 'تم حذف الفاتورة بنجاح'], 200);
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
            }
        }
    
        // طباعة فاتورة
        public function print($id)
        {
            $invoice = Invoice::findOrFail($id);
            return redirect()->route('group_Print_single_invoices', [
                'invoice_date' => $invoice->invoice_date,
                'doctor_id' => $invoice->Doctor->name,
                'section_id' => $invoice->Section->name,
                'Group_id' => $invoice->Group->name,
                'type' => $invoice->type,
                'price' => $invoice->price,
                'discount_value' => $invoice->discount_value,
                'tax_rate' => $invoice->tax_rate,
                'total_with_tax' => $invoice->total_with_tax,
            ]);
        }


    // public function getSection( $id)
    // {
    //     // الحصول على القسم الخاص بالطبيب
    //     $doctor = Doctor::with('section')->find($id);
    //     $section = $doctor->section;

    //     // إرجاع البيانات كـ JSON
    //     return response()->json([

    //         'section_name' => $section->name,
    //     ]);
    // }
    public function getSection($id)
    {
        // الحصول على القسم الخاص بالطبيب
        $doctor = Doctor::with('section')->find($id);
        $section = $doctor->section;
    
        // إرجاع البيانات كـ JSON
        return response()->json([
            'section_id' => $section->id, // تأكد من إرجاع section_id كعدد صحيح
            'section_name' => $section->name,
        ]);
    }


    public function getDetails($id)
    {
        // إرجاع تفاصيل المجموعة كـ JSON
        $group = Group::findOrFail($id);
        return response()->json([
            'price' => $group->Total_after_discount,
            'discount_value' => $group->discount_value,
            'tax_rate' => $group->tax_rate,
        ]);
    }
}



