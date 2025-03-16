<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{


        /**
     * عرض قائمة التأمينات
     */
    public function index()
    {
        // جلب جميع التأمينات من قاعدة البيانات
        $insurances = Insurance::all();

        // عرض البيانات في view
        return view('backend.admin.insurances.index', compact('insurances'));
    }

    /**
     * عرض نموذج إنشاء تأمين جديد
     */
    public function create()
    {
        // عرض نموذج الإنشاء
        return view('backend.admin.insurances.create');
    }

    /**
     * حفظ بيانات التأمين الجديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'insurance_code' => 'required|string|max:255',
            'discount_percentage' => 'required|string|max:255',
            'Company_rate' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // إنشاء تأمين جديد
        Insurance::create([
            'name' => $request->name,
            'notes' => $request->notes,
            'insurance_code' => $request->insurance_code,
            'discount_percentage' => $request->discount_percentage,
            'Company_rate' => $request->Company_rate,
            'status' => $request->status,
        ]);

        toastr()->success('تم انشاء التأمين بنجاح.');
        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.insurances.index');
    }

    /**
     * عرض بيانات تأمين معين
     */
    public function show(Insurance $insurance)
    {
        // عرض بيانات التأمين
        return view('backend.admin.insurances.show', compact('insurance'));
    }

    /**
     * عرض نموذج تعديل بيانات التأمين
     */
    public function edit(Insurance $insurance)
    {
        // عرض نموذج التعديل مع بيانات التأمين الحالية
        return view('backend.admin.insurances.edit', compact('insurance'));
    }

    /**
     * تحديث بيانات التأمين في قاعدة البيانات
     */
    public function update(Request $request, Insurance $insurance)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'insurance_code' => 'required|string|max:255',
            'discount_percentage' => 'required|string|max:255',
            'Company_rate' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // تحديث بيانات التأمين
        $insurance->update($request->all());

        toastr()->success('تم تحديث بيانات التأمين بنجاح ');
        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.insurances.index');
    }

    /**
     * حذف تأمين من قاعدة البيانات
     */
    public function destroy(Insurance $insurance)
    {
        // حذف التأمين
        $insurance->delete();

        // إعادة التوجيه مع رسالة نجاح
        return response()->json([
            'status' => 'success',
            'message' => 'تم حذف بيانات التامين  بنجاح',
        ]);
    }
}









