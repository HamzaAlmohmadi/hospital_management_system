<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    /**
     * عرض قائمة المرضى
     */
    public function index()
    {
        // جلب جميع المرضى من قاعدة البيانات
        $patients = Patient::all();

        // عرض البيانات في view
        return view('backend.admin.patients.index', compact('patients'));
    }

    /**
     * عرض نموذج إنشاء مريض جديد
     */
    public function create()
    {
        // عرض نموذج إنشاء مريض
        return view('backend.admin.patients.create');
    }



    public function store(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'password' => 'required|string|min:8',
            'Date_Birth' => 'required|date',
            'Phone' => 'required|string|max:20',
            'Gender' => 'required|string|in:Male,Female',
            'Blood_Group' => 'required|string',
        ]);
    
        // إنشاء حساب مستخدم للمريض
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'patient', // تحديد دور المريض
        ]);
    
        // إنشاء المريض وربطه بالمستخدم
        $patient = Patient::create([
            'name' => $request->name,
            'Address' => $request->Address,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'Date_Birth' => $request->Date_Birth,
            'Phone' => $request->Phone,
            'Gender' => $request->Gender,
            'Blood_Group' => $request->Blood_Group,
            'user_id' => $user->id, // تعيين user_id
        ]);
    
        // إعلام المستخدم بنجاح العملية
        toastr()->success('تم إنشاء المريض بنجاح.');
        return redirect()->route('admin.patients.index');
    }
    /**
     * عرض بيانات مريض معين
     */

    public function edit(Patient $patient)
    {
        // عرض نموذج التعديل مع بيانات المريض الحالية
        return view('backend.admin.patients.edit', compact('patient'));
    }

    /**
     * تحديث بيانات المريض في قاعدة البيانات
     */
    public function update(Request $request, Patient $patient)
    {
        // التحقق من البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'Address' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'password' => 'nullable|string|min:8',
            'Date_Birth' => 'required|date',
            'Phone' => 'required|string|unique:patients,Phone,' . $patient->id,
            'Gender' => 'required|string',
            'Blood_Group' => 'required|string',
        ]);

        // تحديث بيانات المريض
        $patient->update([
            'name' => $request->name,
            'Address' => $request->Address,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $patient->password, // تحديث كلمة المرور إذا تم إدخالها
            'Date_Birth' => $request->Date_Birth,
            'Phone' => $request->Phone,
            'Gender' => $request->Gender,
            'Blood_Group' => $request->Blood_Group,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        toastr()->success('تم تحديث بيانات المريض بنجاح.');
        return redirect()->route('admin.patients.index');
    }

    /**
     * حذف مريض من قاعدة البيانات
     */
    public function destroy(Patient $patient)
    {
        // حذف المريض
        $patient->delete();

        // إعادة التوجيه مع رسالة نجاح
        return response()->json([
            'status' => 'success',
            'message' => 'تم حذف بيانات المريض  بنجاح',
        ]);
    }
}









