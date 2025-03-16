<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{

        // عرض قائمة الأطباء
        public function index()
        {
            $doctors = Doctor::with('section', 'days')->get();
            return view('backend.admin.doctors.index', compact('doctors'));
        }
    


        // عرض نموذج إنشاء طبيب
        public function create()
        {
            $sections = Section::all(); // قائمة الأقسام
  
            $days = Day::all(); // قائمة الأيام
            return view('backend.admin.doctors.create', compact('sections', 'days'));
        }
    
        // حفظ بيانات الطبيب
        // public function store(Request $request)
        // {
        //     // التحقق من البيانات
        //     $request->validate([
        //         'name' => 'required|string|max:255',
        //         'email' => 'required|email|unique:doctors,email',
        //         'password' => 'required|string|min:8',
        //         'phone' => 'required|string|max:20',
        //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //         'section_id' => 'required|exists:sections,id',
        //         'status' => 'nullable|boolean',
        //         'days' => 'required|array', // أيام الدوام
        //         'days.*' => 'exists:days,id', // التأكد من أن الأيام موجودة في الجدول
        //     ]);
    
        //     // حفظ صورة الطبيب (إذا تم تحميلها)
        //     $imagePath = null;
        //     if ($request->hasFile('image')) {
        //         $imagePath = $request->file('image')->store('doctors', 'public');
        //     }
    
        //     // إنشاء الطبيب
        //     $doctor = Doctor::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => bcrypt($request->password),
        //         'phone' => $request->phone,
        //         'image' => $imagePath,
        //         'section_id' => $request->section_id,
        //         'status' => $request->status ?? false,
        //     ]);
    
        //     // إرفاق أيام الدوام بالطبيب
        //     $doctor->days()->attach($request->days);
    
        //     // إعلام المستخدم بنجاح العملية
        //     toastr()->success('تم إنشاء الطبيب بنجاح.');
        //     return redirect()->route('admin.doctors.index');
        // }
        public function store(Request $request)
        {
            // التحقق من البيانات
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:doctors,email',
                'password' => 'required|string|min:8',
                'phone' => 'required|string|max:20',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'section_id' => 'required|exists:sections,id',
                'status' => 'nullable|boolean',
                'days' => 'required|array', // أيام الدوام
                'days.*' => 'exists:days,id', // التأكد من أن الأيام موجودة في الجدول
            ]);
        
            // حفظ صورة الطبيب (إذا تم تحميلها)
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('doctors', 'public');
            }
        
            // إنشاء حساب مستخدم للطبيب
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'doctor', // تحديد دور الطبيب
            ]);
        

            // إنشاء الطبيب وربطه بالمستخدم
            $doctor = Doctor::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'image' => $imagePath,
                'section_id' => $request->section_id,
                'status' => $request->status ?? false,
                'user_id' => $user->id, // ربط الطبيب بالمستخدم
            ]);
        
            // إرفاق أيام الدوام بالطبيب
            $doctor->days()->attach($request->days);
        
            // إعلام المستخدم بنجاح العملية
            toastr()->success('تم إنشاء الطبيب بنجاح.');
            return redirect()->route('admin.doctors.index');
        }
    
        // عرض نموذج تعديل طبيب
        public function edit(Doctor $doctor)
        {
            $sections = Section::all(); // قائمة الأقسام
            $days = Day::all(); // قائمة الأيام
            return view('backend.admin.doctors.edit', compact('doctor', 'sections', 'days'));
        }
    
        // تحديث بيانات الطبيب
        // public function update(Request $request, Doctor $doctor)
        // {
        //     // التحقق من البيانات
        //     $request->validate([
        //         'name' => 'required|string|max:255',
        //         'email' => 'required|email|unique:doctors,email,' . $doctor->id,
        //         'password' => 'nullable|string|min:8',
        //         'phone' => 'required|string|max:20',
        //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //         'section_id' => 'required|exists:sections,id',
        //         'status' => 'nullable|boolean',
        //         'days' => 'required|array', // أيام الدوام
        //         'days.*' => 'exists:days,id', // التأكد من أن الأيام موجودة في الجدول
        //     ]);
    
        //     // تحديث صورة الطبيب (إذا تم تحميلها)
        //     $imagePath = $doctor->image;
        //     if ($request->hasFile('image')) {
        //         // حذف الصورة القديمة (إذا كانت موجودة)
        //         if ($doctor->image) {
        //             Storage::disk('public')->delete($doctor->image);
        //         }
        //         $imagePath = $request->file('image')->store('doctors', 'public');
        //     }
    
        //     // تحديث بيانات الطبيب
        //     $doctor->update([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => $request->password ? bcrypt($request->password) : $doctor->password,
        //         'phone' => $request->phone,
        //         'image' => $imagePath,
        //         'section_id' => $request->section_id,
        //         'status' => $request->status ?? $doctor->status,
        //     ]);
    
        //     // تحديث أيام الدوام
        //     $doctor->days()->sync($request->days);
    
        //     // إعلام المستخدم بنجاح العملية
        //     toastr()->success('تم تحديث بيانات الطبيب بنجاح.');
        //     return redirect()->route('admin.doctors.index');
        // }

        public function update(Request $request, Doctor $doctor)
        {
            // التحقق من البيانات
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:doctors,email,' . $doctor->id,
                'password' => 'nullable|string|min:8',
                'phone' => 'required|string|max:20',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'section_id' => 'required|exists:sections,id',
                'status' => 'nullable|boolean',
                'days' => 'required|array', // أيام الدوام
                'days.*' => 'exists:days,id', // التأكد من أن الأيام موجودة في الجدول
            ]);
        
            // تحديث صورة الطبيب (إذا تم تحميلها)
            $imagePath = $doctor->image;
            if ($request->hasFile('image')) {
                // حذف الصورة القديمة (إذا كانت موجودة)
                if ($doctor->image) {
                    Storage::disk('public')->delete($doctor->image);
                }
                $imagePath = $request->file('image')->store('doctors', 'public');
            }
        
            // تحديث حساب المستخدم المرتبط بالطبيب
            $user = $doctor->user;
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $user->password,
                
            ]);
        
            // تحديث بيانات الطبيب
            $doctor->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? bcrypt($request->password) : $doctor->password,
                'phone' => $request->phone,
                'image' => $imagePath,
                'section_id' => $request->section_id,
                'status' => $request->status ?? $doctor->status,
            ]);
        
            // تحديث أيام الدوام
            $doctor->days()->sync($request->days);
        
            // إعلام المستخدم بنجاح العملية
            toastr()->success('تم تحديث بيانات الطبيب بنجاح.');
            return redirect()->route('admin.doctors.index');
        }
    
        // حذف طبيب
        public function destroy(Doctor $doctor)
        {
            // حذف صورة الطبيب (إذا كانت موجودة)
            if ($doctor->image) {
                Storage::disk('public')->delete($doctor->image);
            }
    
            // حذف الطبيب
            $doctor->delete();
    
            // إعلام المستخدم بنجاح العملية
         
            return response()->json([
                'status' => 'success',
                'message' => 'تم حذف الطبيب بنجاح',
            ]);
        }
}

















// namespace App\Http\Controllers;

// use App\Models\Doctor;
// use App\Models\Section;
// use App\Models\Day;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

// class DoctorController extends Controller
// {
//     // عرض قائمة الأطباء
//     public function index()
//     {
//         $doctors = Doctor::with('section', 'days')->get();
//         return view('backend.admin.doctors.index', compact('doctors'));
//     }

//     // عرض نموذج إنشاء طبيب
//     public function create()
//     {
//         $sections = Section::all(); // قائمة الأقسام
//         $days = Day::all(); // قائمة الأيام
//         return view('backend.admin.doctors.create', compact('sections', 'days'));
//     }

//     // حفظ بيانات الطبيب
//     public function store(Request $request)
//     {
//         // التحقق من البيانات
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:doctors,email',
//             'password' => 'required|string|min:8',
//             'phone' => 'required|string|max:20',
//             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'section_id' => 'required|exists:sections,id',
//             'status' => 'nullable|boolean',
//             'days' => 'required|array', // أيام الدوام
//             'days.*' => 'exists:days,id', // التأكد من أن الأيام موجودة في الجدول
//         ]);

//         // حفظ صورة الطبيب (إذا تم تحميلها)
//         $imagePath = null;
//         if ($request->hasFile('image')) {
//             $imagePath = $request->file('image')->store('doctors', 'public');
//         }

//         // إنشاء الطبيب
//         $doctor = Doctor::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => bcrypt($request->password),
//             'phone' => $request->phone,
//             'image' => $imagePath,
//             'section_id' => $request->section_id,
//             'status' => $request->status ?? false,
//         ]);

//         // إرفاق أيام الدوام بالطبيب
//         $doctor->days()->attach($request->days);

//         // إعلام المستخدم بنجاح العملية
//         toastr()->success('تم إنشاء الطبيب بنجاح.');
//         return redirect()->route('admin.doctors.index');
//     }

//     // عرض نموذج تعديل طبيب
//     public function edit(Doctor $doctor)
//     {
//         $sections = Section::all(); // قائمة الأقسام
//         $days = Day::all(); // قائمة الأيام
//         return view('backend.admin.doctors.edit', compact('doctor', 'sections', 'days'));
//     }

//     // تحديث بيانات الطبيب
//     public function update(Request $request, Doctor $doctor)
//     {
//         // التحقق من البيانات
//         $request->validate([
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|unique:doctors,email,' . $doctor->id,
//             'password' => 'nullable|string|min:8',
//             'phone' => 'required|string|max:20',
//             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//             'section_id' => 'required|exists:sections,id',
//             'status' => 'nullable|boolean',
//             'days' => 'required|array', // أيام الدوام
//             'days.*' => 'exists:days,id', // التأكد من أن الأيام موجودة في الجدول
//         ]);

//         // تحديث صورة الطبيب (إذا تم تحميلها)
//         $imagePath = $doctor->image;
//         if ($request->hasFile('image')) {
//             // حذف الصورة القديمة (إذا كانت موجودة)
//             if ($doctor->image) {
//                 Storage::disk('public')->delete($doctor->image);
//             }
//             $imagePath = $request->file('image')->store('doctors', 'public');
//         }

//         // تحديث بيانات الطبيب
//         $doctor->update([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => $request->password ? bcrypt($request->password) : $doctor->password,
//             'phone' => $request->phone,
//             'image' => $imagePath,
//             'section_id' => $request->section_id,
//             'status' => $request->status ?? $doctor->status,
//         ]);

//         // تحديث أيام الدوام
//         $doctor->days()->sync($request->days);

//         // إعلام المستخدم بنجاح العملية
//         toastr()->success('تم تحديث بيانات الطبيب بنجاح.');
//         return redirect()->route('admin.doctors.index');
//     }

//     // حذف طبيب
//     public function destroy(Doctor $doctor)
//     {
//         // حذف صورة الطبيب (إذا كانت موجودة)
//         if ($doctor->image) {
//             Storage::disk('public')->delete($doctor->image);
//         }

//         // حذف الطبيب
//         $doctor->delete();

//         // إعلام المستخدم بنجاح العملية
//         toastr()->success('تم حذف الطبيب بنجاح.');
//         return redirect()->route('admin.doctors.index');
//     }
// }