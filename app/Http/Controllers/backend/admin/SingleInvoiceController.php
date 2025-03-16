<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SingleInvoiceController extends Controller
{

        // عرض صفحة الفواتير المفردة
        public function index()
        {
            $single_invoices = Invoice::where('invoice_type', 1)->get();
            $patients = Patient::all();
            $doctors = Doctor::all();
            $services = Service::all();
            return view('backend.admin.single_invoices.index', compact('single_invoices', 'patients', 'doctors', 'services'));
        }
    

        public function create()
        {
            $patients = Patient::all();
            $doctors = Doctor::all();
            $services = Service::all();
            return view('backend.admin.single_invoices.create', compact('patients', 'doctors', 'services'));
        }
  
        public function store(Request $request)
        {
            // dd($request->all());
            // التحقق من صحة البيانات
            $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:doctors,id',
                'section_id' => 'required|exists:sections,id',
                'service_id' => 'required|exists:services,id',
                'price' => 'required|numeric|min:0',
                'discount_value' => 'nullable|numeric|min:0',
                'tax_rate' => 'nullable|numeric|min:0',
                'type' => 'required|in:1,2', // 1: نقدي, 2: آجل
            ]);
        
            DB::beginTransaction();
            try {
                // حساب القيم المالية
                $subtotal = $request->price - ($request->discount_value ?? 0);
                $taxRate = $request->tax_rate ?? 17; // نسبة الضريبة الافتراضية 17%
                $taxValue = $subtotal * ($taxRate / 100);
                $totalWithTax = $subtotal + $taxValue;
        
                // إنشاء الفاتورة
                $invoice = new Invoice();
                $invoice->invoice_type = 1; // نوع الفاتورة (مفردة)
                $invoice->invoice_date = now();
                $invoice->patient_id = $request->patient_id;
                $invoice->doctor_id = $request->doctor_id;
                $invoice->section_id = $request->section_id;
                $invoice->Service_id = $request->service_id;
                $invoice->price = $request->price;
                $invoice->discount_value = $request->discount_value ?? 0;
                $invoice->tax_rate = $taxRate;
                $invoice->tax_value = $taxValue;
                $invoice->total_with_tax = $totalWithTax;
                $invoice->type = $request->type;
                $invoice->invoice_status = 1; // حالة الفاتورة (مفتوحة)
                $invoice->save();
        
                // إضافة الحركة المالية بناءً على نوع الفاتورة
                if ($request->type == 1) { // نقدي
                    FundAccount::create([
                        'date' => now(),
                        'invoice_id' => $invoice->id,
                        'Debit' => $totalWithTax,
                        'credit' => 0.00,
                    ]);
                } else { // آجل
                    PatientAccount::create([
                        'date' => now(),
                        'invoice_id' => $invoice->id,
                        'patient_id' => $request->patient_id,
                        'Debit' => $totalWithTax,
                        'credit' => 0.00,
                    ]);
                }
        
                DB::commit();
                toastr()->success('تم حفظ الفاتورة بنجاح');
                return redirect()->route('admin.single_invoices.index');
            } catch (\Exception $e) {
                DB::rollback();
                toastr()->error('حدث خطأ أثناء حفظ الفاتورة: ' . $e->getMessage());
                return redirect()->back()->withInput();
            }
        }
    
        // تحرير الفاتورة
        public function edit($id)
        {
            $invoice = Invoice::findOrFail($id);
            $patients = Patient::all();
            $doctors = Doctor::all();
            $services = Service::all();
            return view('backend.admin.single_invoices.edit', compact('invoice', 'patients', 'doctors', 'services'));
        }
    
      
        public function update(Request $request, $id)
        {
            // التحقق من صحة البيانات
            $request->validate([
                'patient_id' => 'required|exists:patients,id',
                'doctor_id' => 'required|exists:doctors,id',
                'section_id' => 'required|exists:sections,id',
                'service_id' => 'required|exists:services,id',
                'price' => 'required|numeric|min:0',
                'discount_value' => 'nullable|numeric|min:0',
                'tax_rate' => 'nullable|numeric|min:0',
                'type' => 'required|in:1,2', // 1: نقدي, 2: آجل
            ]);
        
            DB::beginTransaction();
            try {
                // البحث عن الفاتورة المطلوبة
                $invoice = Invoice::findOrFail($id);
        
                // حساب القيم المالية
                $subtotal = $request->price - ($request->discount_value ?? 0);
                $taxRate = $request->tax_rate ?? 17; // نسبة الضريبة الافتراضية 17%
                $taxValue = $subtotal * ($taxRate / 100);
                $totalWithTax = $subtotal + $taxValue;
        
                // تحديث بيانات الفاتورة
                $invoice->patient_id = $request->patient_id;
                $invoice->doctor_id = $request->doctor_id;
                $invoice->section_id = $request->section_id;
                $invoice->Service_id = $request->service_id;
                $invoice->price = $request->price;
                $invoice->discount_value = $request->discount_value ?? 0;
                $invoice->tax_rate = $taxRate;
                $invoice->tax_value = $taxValue;
                $invoice->total_with_tax = $totalWithTax;
                $invoice->type = $request->type;
                $invoice->save();
        
                // تحديث الحركة المالية بناءً على نوع الفاتورة
                if ($request->type == 1) { // نقدي
                    FundAccount::updateOrCreate(
                        ['invoice_id' => $invoice->id],
                        [
                            'date' => now(),
                            'Debit' => $totalWithTax,
                            'credit' => 0.00,
                        ]
                    );
                } else { // آجل
                    PatientAccount::updateOrCreate(
                        ['invoice_id' => $invoice->id],
                        [
                            'date' => now(),
                            'patient_id' => $request->patient_id,
                            'Debit' => $totalWithTax,
                            'credit' => 0.00,
                        ]
                    );
                }
        
                DB::commit();
                toastr()->success('تم تحديث الفاتورة بنجاح');
                return redirect()->route('admin.single_invoices.index');
            } catch (\Exception $e) {
                DB::rollback();
                toastr()->error('حدث خطأ أثناء تحديث الفاتورة: ' . $e->getMessage());
                return redirect()->back()->withInput();
            }
        }
    
        // حذف الفاتورة
        public function destroy($id)
        {
            Invoice::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'تم حذف الفاتورة بنجاح']);
        }
    
        // طباعة الفاتورة
        public function print($id)
        {
            $invoice = Invoice::findOrFail($id);
            return view('backend.admin.single_invoices.print', [
                'invoice_date' => $invoice->invoice_date,
                'doctor_id' => $invoice->Doctor->name,
                'section_id' => $invoice->Section->name,
                'Service_id' => $invoice->Service->name,
                'type' => $invoice->type,
                'price' => $invoice->price,
                'discount_value' => $invoice->discount_value,
                'tax_rate' => $invoice->tax_rate,
                'total_with_tax' => $invoice->total_with_tax,
            ]);
        }

        public function calculateTotals(Request $request)
        {
            $subtotal = ((is_numeric($request->price) ? $request->price : 0)) - ((is_numeric($request->discount_value) ? $request->discount_value : 0));
            $tax_value = $subtotal * ((is_numeric($request->tax_rate) ? $request->tax_rate : 0) / 100);
            $total = $subtotal + $tax_value;
        
            return response()->json([
                'subtotal' => $subtotal,
                'tax_value' => $tax_value,
                'total' => $total,
            ]);
        }
        
        

                // جلب القسم بناءً على الطبيب المحدد
                public function getSection($doctor_id)
                {

                    $doctor = Doctor::with('section')->find($doctor_id);
                    return response()->json([
                        'section_id' => $doctor->section->id,
                        'section_name' => $doctor->section->name,
                    ]);
                }
            

                public function getPrice($service_id)
                {
                    $service = Service::find($service_id);
                        
                    if ($service) {
                        return response()->json([
                            'price' => $service->price,
                        ]);
                    } else {
                        return response()->json([
                            'error' => 'الخدمة غير موجودة',
                        ], 404);
                    }
                }
                

}

