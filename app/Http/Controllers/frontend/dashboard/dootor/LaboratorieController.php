<?php

namespace App\Http\Controllers\frontend\dashboard\dootor;

use App\Http\Controllers\Controller;
use App\Models\Laboratorie;
use App\Models\Ray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboratorieController extends Controller
{
    public function index()
    {
        // $Laboratorie = Laboratorie::all();
        // return view('frontend.dashboard.doctor.laboratorie.index',compact('Laboratorie'));
    }
    

    public function show($id)
    {

        $laboratories = Laboratorie::findorFail($id);
        if($laboratories->doctor_id !=Auth::user()->doctor->id){
            toastr()->error('لا يمكنك الوصول لهذه الصفحة');
            return redirect()->route('404');
        }
        return view('frontend.dashboard.doctor.invoices.laboratorie.view_laboratories', compact('laboratories'));
    }

    public function store(Request $request)
    {
        try {    
            $laboratorie = new Laboratorie;
            $laboratorie->description = $request->description;
            $laboratorie->invoice_id = $request->invoice_id;
            $laboratorie->patient_id = $request->patient_id;
            $laboratorie->doctor_id = $request->doctor_id;
            $laboratorie->save();
            toastr()->success('تم تحويل المريض لا المختبر بنجاح !');

    
            return redirect()->back();
        }
        catch (\Exception $e) {
            toastr()->error('خطأ في ارسال البيانات!');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request,)
    {

        try {
            $Laboratorie = Laboratorie::findOrFail($request->id);
            $Laboratorie->update([
                'description' => $request->description,
            ]);
            toastr()->success('تم تحويل المريض لا المختبر بنجاح !');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toastr()->error('خطأ في ارسال البيانات!');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Laboratorie ::destroy($id);
            toastr()->success('تم حذف البيانات بنجاح  !');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }




}
