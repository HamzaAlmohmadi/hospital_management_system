<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\RayEmployee;
use App\Models\User;
use Illuminate\Http\Request;

class RayEmployeeController extends Controller
{

     // عرض قائمة الموظفين
     public function index()
     {
         $employees = RayEmployee::paginate(10); // جلب البيانات مع ترقيم الصفحات
         return view('backend.admin.ray_employees.index', compact('employees'));
     }
 
     // عرض نموذج إنشاء موظف
     public function create()
     {
         return view('backend.admin.ray_employees.create');
     }
 

     
    public function store(Request $request)
    {
        // التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:ray_employees,email',
            'password' => 'required|string|min:8',
        ]);
    
        // إنشاء حساب مستخدم لموظف الأشعة
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'ray_employee', // تحديد دور موظف الأشعة
        ]);
    
        // إنشاء موظف الأشعة وربطه بالمستخدم
        RayEmployee::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_id' => $user->id, // ربط موظف الأشعة بالمستخدم
        ]);
    
        // إعلام المستخدم بنجاح العملية
        toastr()->success('تم انشاء الموظف بنجاح');
        return redirect()->route('admin.ray_employees.index');
    }
 
     // عرض نموذج تعديل موظف
     public function edit(RayEmployee $rayEmployee)
     {
         return view('backend.admin.ray_employees.edit', compact('rayEmployee'));
     }
 



    public function update(Request $request, RayEmployee $rayEmployee)
    {
        // التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:ray_employees,email,' . $rayEmployee->id,
            'password' => 'nullable|string|min:8',
        ]);
    
        // تحديث حساب المستخدم المرتبط بموظف الأشعة
        $user = $rayEmployee->user;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
    
        // تحديث بيانات موظف الأشعة
        $rayEmployee->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $rayEmployee->password,
        ]);
    
        // إعلام المستخدم بنجاح العملية
        toastr()->success('تم تحديث الموظف بنجاح');
        return redirect()->route('admin.ray_employees.index');
    }



     public function destroy(RayEmployee $rayEmployee)
     {
         // حذف حساب المستخدم المرتبط بموظف الأشعة
         $rayEmployee->user()->delete();
     
         // حذف موظف الأشعة
         $rayEmployee->delete();
     
         return response()->json(['status' => 'success', 'message' => 'تم حذف الموظف بنجاح']);
     }
}











