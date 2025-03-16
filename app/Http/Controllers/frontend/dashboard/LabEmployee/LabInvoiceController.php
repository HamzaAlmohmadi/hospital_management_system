<?php

namespace App\Http\Controllers\frontend\dashboard\LabEmployee;

use App\Http\Controllers\Controller;
use App\Models\Laboratorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabInvoiceController extends Controller
{

    public function index()
    {
        $invoices = Laboratorie::where('case', 0)->get();
        return view('frontend.dashboard.lab_employee.invoices.index', compact('invoices'));
    }

    public function completed_invoices()
    {
        $invoices = Laboratorie::where('case', 1)->where('employee_id', Auth::user()->labemployee->id)->get();
        return view('frontend.dashboard.lab_employee.invoices.completed_invoices', compact('invoices'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {

            $invoice = Laboratorie::findOrFail($request->invoice_id);
            $invoice->update([
                'employee_id' => Auth::user()->labemployee->id,
                'description_employee' => $request->description_employee,
                'case' => 1,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photos) {
                    $path = $photos->store('Labs', 'public');
                    // $invoice->images()->create(['path' => $path]);
                    $invoice->images()->create(
                        ['filename' => $path,
                        'imageable_type' => 'Lab',
                        ]

                    );
                }
            }


            toastr()->success('تم إضافة التشخيص بنجاح !');
            return redirect()->route('lab.invoices_lab_employee.index');
        } catch (\Exception $e) {
            toastr()->error('خطأ في ارسال البيانات!');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $invoice = Laboratorie::findOrFail($id);
        return view('frontend.dashboard.lab_employee.invoices.add_diagnosis', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description_employee' => 'required|string',
            'reports.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $invoice = Laboratorie::findOrFail($id);
            $invoice->update([
                'description_employee' => $request->description_employee,
                'case' => 1,
            ]);

            if ($request->hasFile('reports')) {
                foreach ($request->reports as $report) {
                    $path = $report->store('Labs', 'public');
                    $invoice->images()->create(['path' => $path]);
                }
            }

            toastr()->success('تم تعديل التشخيص بنجاح !');
            return redirect()->route('invoices_lab_employee.index');
        } catch (\Exception $e) {
            toastr()->error('خطأ في تعديل البيانات!');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Laboratorie::destroy($id);
            toastr()->success('تم حذف البيانات بنجاح !');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $invoice = Laboratorie::findOrFail($id);
        if ($invoice->employee_id != Auth::user()->labemployee->id) {
            toastr()->error('لا يمكنك الوصول لهذه الصفحة');
            return redirect()->back();
        }
        return view('frontend.dashboard.lab_employee.invoices.patient_details', compact('invoice'));
    }

    public function view_reports($id)
    {
        $reports = Laboratorie::findOrFail($id);
        if ($reports->employee_id != Auth::user()->id) {
            return redirect()->route('404');
        }
        return view('frontend.dashboard.lab_employee.invoices.patient_details', compact('reports'));
    }
}

