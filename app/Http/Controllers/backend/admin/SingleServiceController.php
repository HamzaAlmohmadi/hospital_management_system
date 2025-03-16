<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{

        /**
     * عرض قائمة الخدمات
     */
    public function index()
    {
        // جلب جميع الخدمات من قاعدة البيانات
        $services = Service::all();

        // عرض البيانات في view
        return view('backend.admin.services.index', compact('services'));
    }

    /**
     * عرض نموذج إنشاء خدمة جديدة
     */
    public function create()
    {
        // عرض نموذج إنشاء خدمة
        return view('backend.admin.services.create');
    }

    /**
     * حفظ بيانات الخدمة الجديدة في قاعدة البيانات
     */
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        // إنشاء خدمة جديدة
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        toastr()->success('تم إنشاء الخدمة بنجاح');
        return redirect()->route('admin.services.index');
    }


    /**
     * عرض نموذج تعديل بيانات الخدمة
     */
    public function edit(Service $service)
    {
        // عرض نموذج التعديل مع بيانات الخدمة الحالية
        return view('backend.admin.services.edit', compact('service'));
    }

    /**
     * تحديث بيانات الخدمة في قاعدة البيانات
     */
    public function update(Request $request, Service $service)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        // تحديث بيانات الخدمة
        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        toastr()->success('تم تحديث بيانات الخدمة بنجاح.');
        return redirect()->route('admin.services.index');
    }

    /**
     * حذف خدمة من قاعدة البيانات
     */
    public function destroy(Service $service)
    {
        // حذف الخدمة
        $service->delete();

        // إعادة التوجيه مع رسالة نجاح
        return response()->json([
            'status' => 'success',
            'message' => 'تم حذف الخدمة بنجاح',
        ]);
    }
}










