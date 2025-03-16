<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Reservation;
use App\Models\Section;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //     /**
    //  * عرض صفحة الحجز
    //  */
    // public function create()
    // {
    //     $sections = Section::all();
    //     return view('appointments.create', compact('sections'));
    // }

    // /**
    //  * جلب الأطباء بناءً على القسم المختار
    //  */
    // public function getDoctors(Request $request)
    // {
    //     $doctors = Doctor::where('section_id', $request->section_id)->get();
    //     return response()->json($doctors);
    // }

    // /**
    //  * تخزين حجز جديد
    //  */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'doctor' => 'required|exists:doctors,id',
    //         'section' => 'required|exists:sections,id',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $appointment = new Reservation();
    //     $appointment->doctor_id = $request->doctor;
    //     $appointment->section_id = $request->section;
    //     $appointment->name = $request->name;
    //     $appointment->email = $request->email;
    //     $appointment->phone = $request->phone;
    //     $appointment->notes = $request->notes;
    //     $appointment->save();

    //     return response()->json(['success' => 'تم إرسال تفاصيل الحجز بنجاح!']);
    // }



        // عرض نموذج الحجز
        public function create()
        {
            // جلب الأقسام والأطباء
            $sections = Section::all();
            $doctors = collect(); // قائمة فارغة للأطباء
    
            return view('frontend.home', compact('sections', 'doctors'));
        }
    
         // تحديث قائمة الأطباء عند اختيار قسم


        public function getDoctors(Request $request)
        {
            $sectionId = $request->input('section_id');
            $doctors = Doctor::where('section_id', $sectionId)->get();
            return response()->json($doctors);
        }

    
        // حفظ الحجز
        public function store(Request $request)
        {
            // التحقق من البيانات
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'doctor' => 'required|exists:doctors,id',
                'section' => 'required|exists:sections,id',
                'notes' => 'nullable|string',
            ]);
    
            // إنشاء حجز جديد
            $appointment = new Reservation();
            $appointment->doctor_id = $validated['doctor'];
            $appointment->section_id = $validated['section'];
            $appointment->name = $validated['name'];
            $appointment->email = $validated['email'];
            $appointment->phone = $validated['phone'];
            $appointment->notes = $validated['notes'] ?? null;
            $appointment->save();
            toastr()->success('تم ارسال تفاصيل الحجز إلى المستشفى وسيتم ارسال معلومات الموعد عبر الهاتف والبريد الإلكتروني.');
    
            // إعادة توجيه مع رسالة نجاح
            return redirect()->route('home');
        }
}





