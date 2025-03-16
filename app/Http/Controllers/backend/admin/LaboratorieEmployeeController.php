<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\LaboratorieEmployee;
use App\Models\User;
use Illuminate\Http\Request;

class LaboratorieEmployeeController extends Controller
{


        // عرض قائمة الموظفين
        public function index()
        {
            $employees = LaboratorieEmployee::paginate(10); // جلب البيانات مع ترقيم الصفحات
            return view('backend.admin.laboratorie_employees.index', compact('employees'));
        }
    
        // عرض نموذج إنشاء موظف
        public function create()
        {
            return view('backend.admin.laboratorie_employees.create');
        }
    
        // حفظ موظف جديد
        public function store(Request $request)
        {
            // التحقق من البيانات
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:laboratorie_employees,email',
                'password' => 'required|string|min:8',
            ]);
        
            // إنشاء حساب مستخدم لموظف المختبر
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'laboratorie_employee', // تحديد دور موظف المختبر
            ]);
        
            // إنشاء موظف المختبر وربطه بالمستخدم
            LaboratorieEmployee::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'user_id' => $user->id, // ربط موظف المختبر بالمستخدم
            ]);
        
            // إعلام المستخدم بنجاح العملية
            toastr()->success('تم انشاء الموظف بنجاح');
            return redirect()->route('admin.laboratorie_employees.index');
        }
    
        // عرض نموذج تعديل موظف
        public function edit(LaboratorieEmployee $laboratorieEmployee)
        {
            return view('backend.admin.laboratorie_employees.edit', compact('laboratorieEmployee'));
        }
    
        // تحديث بيانات الموظف
        // public function update(Request $request, LaboratorieEmployee $laboratorieEmployee)
        // {
        //     $request->validate([
        //         'name' => 'required|string|max:255',
        //         'email' => 'required|email|unique:laboratorie_employees,email,' . $laboratorieEmployee->id,
        //         'password' => 'nullable|string|min:8',
        //     ]);
    
        //     $laboratorieEmployee->update([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $request->password ? bcrypt($request->password) : $laboratorieEmployee->password,
        //     ]);
    
        //     toastr()->success('تم تحديث الموظف بنجاح');
        //     return redirect()->route('admin.laboratorie_employees.index');
        // }
        public function update(Request $request, LaboratorieEmployee $laboratorieEmployee)
        {
            // التحقق من البيانات
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:laboratorie_employees,email,' . $laboratorieEmployee->id,
                'password' => 'nullable|string|min:8',
            ]);
        
            // تحديث حساب المستخدم المرتبط بموظف المختبر
            $user = $laboratorieEmployee->user;
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
                'role' => 'laboratorie_employee',
            ]);
        
            // تحديث بيانات موظف المختبر
            $laboratorieEmployee->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $laboratorieEmployee->password,
            ]);
        
            // إعلام المستخدم بنجاح العملية
            toastr()->success('تم تحديث الموظف بنجاح');
            return redirect()->route('admin.laboratorie_employees.index');
        }
    
        // حذف موظف
        public function destroy(LaboratorieEmployee $laboratorieEmployee)
        {
            $laboratorieEmployee->delete();
            return response()->json(['status' => 'success', 'message' => 'تم حذف الموظف بنجاح']);
        }

}








