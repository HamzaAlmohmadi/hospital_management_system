<?php

namespace App\Http\Controllers\frontend\dashboard\RayEmployee;

use App\Http\Controllers\Controller;
use App\Models\Ray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RayInvoiceController extends Controller
{

  
    public function index()
    {
        $invoices = Ray::where('case', 0)->get();
        return view('frontend.dashboard.ray_employee.invoices.index', compact('invoices'));
    }



    public function completed_invoices()
    {
        $invoices = Ray::where('case',1)->where('employee_id',Auth::user()->rayemployee->id)->get();
        return view('frontend.dashboard.ray_employee.invoices.completed_invoices',compact('invoices'));
    }

    /**
     * Store a new diagnosis for the invoice.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        try {
            // البحث عن الفاتورة باستخدام الـ ID
            $invoice = Ray::findOrFail($request->invoice_id);

            // تحديث بيانات الفاتورة
            $invoice->update([
                'employee_id' => Auth::user()->rayemployee->id,
                'description_employee' => $request->description_employee,
                'case' => 1,
            ]);

            // تحميل الصور إذا تم رفعها
            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photo) {
                    // حفظ الصورة في مجلد storage/app/public/Rays
                    $path = $photo->store('Rays', 'public');

                    // حفظ مسار الصورة في قاعدة البيانات (إذا كان لديك حقل لتخزين الصور)
                    // $invoice->images()->create(['path' => $path]);
                    $invoice->images()->create(
                        ['filename' => $path,
                        'imageable_type' => 'Ray',
                        ]

                    );
                }
            }

            // إظهار رسالة نجاح
            toastr()->success('تم إضافة التشخيص بنجاح !');
            return redirect()->route('ray.invoices_ray_employe.index');
        } catch (\Exception $e) {
            // إظهار رسالة خطأ في حالة وجود مشكلة
            toastr()->error('خطأ في ارسال البيانات!');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function edit($id)
    {
        $invoice = Ray::findOrFail($id);
        return view('frontend.dashboard.ray_employee.invoices.add_diagnosis', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description_employee' => 'required|string',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // الصور اختيارية
        ]);

        try {
            $invoice = Ray::findOrFail($id);
            $invoice->update([
                'description_employee' => $request->description_employee,
                'case' => 1,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photo) {
                    // حفظ الصورة في مجلد storage/app/public/Rays
                    $path = $photo->store('Rays', 'public');

                    // حفظ مسار الصورة في قاعدة البيانات (إذا كان لديك حقل لتخزين الصور)
                    $invoice->images()->create(
                        ['filename' => $path,
                        'imageable_type' => 'Ray',
                        ]

                    );


                }
            }

            toastr()->success('تم تعديل التشخيص بنجاح !');
            return redirect()->route('invoices_ray_employee.index');
        } catch (\Exception $e) {
            toastr()->error('خطأ في تعديل البيانات!');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Ray::destroy($id);
            toastr()->success('تم حذف البيانات بنجاح !');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    
    public function show($id)
    {
        $invoice = Ray::findOrFail($id);
        if ($invoice->employee_id != Auth::user()->rayemployee->id) {
            toastr()->error('لا يمكنك الوصول لهذه الصفحة');
            return redirect()->back();
        }
        return view('frontend.dashboard.ray_employee.invoices.patient_details', compact('invoice'));
    }




    
   public function view_rays($id)
   {
       $rays = Ray::findorFail($id);
       if($rays->employee_id !=Auth::user()->id){
           //abort(404);
           return redirect()->route('404');
       }
       return view('Dashboard.dashboard_RayEmployee.invoices.patient_details', compact('rays'));
   }
}








