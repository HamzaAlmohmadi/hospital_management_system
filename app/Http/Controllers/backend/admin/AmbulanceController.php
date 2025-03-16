<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{

    /**
     * عرض قائمة سيارات الإسعاف.
     */
    public function index()
    {
        // جلب جميع سيارات الإسعاف
        $ambulances = Ambulance::all();
        return view('backend.admin.ambulances..index', compact('ambulances'));
    }

    /**
     * عرض نموذج إنشاء سيارة إسعاف جديدة.
     */
    public function create()
    {
        return view('backend.admin.ambulances..create');
    }

    /**
     * حفظ سيارة إسعاف جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'driver_name' => 'required|string',
            'notes' => 'nullable|string',
            'car_number' => 'required|string|unique:ambulances,car_number',
            'car_model' => 'required|string',
            'car_year_made' => 'required|string',
            'driver_license_number' => 'required|string',
            'driver_phone' => 'required|string',
            'is_available' => 'boolean',
            'car_type' => 'integer',
        ]);

        // إنشاء سيارة إسعاف جديدة
        Ambulance::create($request->all());
        toastr()->success('تم إنشاء سيارة الإسعاف بنجاح.');
        return redirect()->route('admin.ambulances.index');
    }

    /**
     * عرض تفاصيل سيارة إسعاف معينة.
     */
    // public function show($id)
    // {
    //     // البحث عن سيارة الإسعاف بواسطة الـ ID
    //     $ambulance = Ambulance::findOrFail($id);
    //     return view('ambulances.', compact('ambulance'));
    // }

    /**
     * عرض نموذج تعديل سيارة إسعاف معينة.
     */
    public function edit($id)
    {
        // البحث عن سيارة الإسعاف بواسطة الـ ID
        $ambulance = Ambulance::findOrFail($id);
        return view('backend.admin.ambulances.edit', compact('ambulance'));
    }

    /**
     * تحديث بيانات سيارة إسعاف معينة في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        // البحث عن سيارة الإسعاف بواسطة الـ ID
        $ambulance = Ambulance::findOrFail($id);

        // التحقق من صحة البيانات
        $request->validate([
            'driver_name' => 'sometimes|string',
            'notes' => 'nullable|string',
            'car_number' => 'sometimes|string|unique:ambulances,car_number,' . $id,
            'car_model' => 'sometimes|string',
            'car_year_made' => 'sometimes|string',
            'driver_license_number' => 'sometimes|string',
            'driver_phone' => 'sometimes|string',
            'is_available' => 'sometimes|boolean',
            'car_type' => 'sometimes|integer',
        ]);

        // تحديث بيانات السيارة
        $ambulance->update($request->all());

        toastr()->success('تم تحديث بيانات سيارة الاسعاف بنجاح.');
        
        return redirect()->route('admin.ambulances.index');

    }

    /**
     * حذف سيارة إسعاف معينة من قاعدة البيانات.
     */
    public function destroy($id)
    {
        // البحث عن سيارة الإسعاف بواسطة الـ ID
        $ambulance = Ambulance::findOrFail($id);

        // حذف السيارة
        $ambulance->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'تم حذف بيانات سيارات الاسعاف  بنجاح',
        ]);
        
    }
}











namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambulance; // تأكد من وجود Model باسم Ambulance

class AmbulanceController extends Controller
{
    
}