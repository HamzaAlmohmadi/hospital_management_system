<?php

namespace App\Http\Controllers\frontend\dashboard\dootor;

use App\Http\Controllers\Controller;
use App\Models\Ray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rays = Ray::findorFail($id);
        if($rays->doctor_id !=Auth::user()->doctor->id){
            toastr()->error('لا يمكنك الوصول لهذه الصفحة');
            return redirect()->route('404');

        }
        return view('frontend.dashboard.doctor.invoices.xray.view_rays', compact('rays'));
    }





    
    public function store(Request $request)
    {

        try {
            Ray::create([
                'description'=>$request->description,
                'invoice_id'=>$request->invoice_id,
                'patient_id'=>$request->patient_id,
                'doctor_id'=>$request->doctor_id,
            ]);
            toastr()->success('تم تحويل المريض الى  قسم الاشعة بنجاح  !');
            return redirect()->back();
        }
        catch (\Exception $e) {
            toastr()->error('خطأ في ارسال البيانات!');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $Ray = Ray::findOrFail($id);
            $Ray->update([
                'description' => $request->description,
            ]);
            toastr()->success('تم تحويل المريض الى  قسم الاشعة بنجاح  !');
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
            Ray ::destroy($id);
            toastr()->success('تم حذف البيانات بنجاح  !');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
