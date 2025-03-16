<?php

namespace App\Http\Controllers\frontend\dashboard\dootor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DoctorProfileController extends Controller
{

    public function index()
    {
        $profile = Doctor::where('user_id', Auth::id())->first();
        return view('frontend.dashboard.doctor.profile.index', compact('profile'));
    }


        // تحديث بيانات الطبيب
        public function updateProfile(Request $request)
        {
            $request->validate([
                'name' => ['required', 'max:100'],
                'email' => ['required', 'email', 'unique:users,email,' . Auth::id()],
                'phone' => ['required', 'max:15'],
                'image' => ['nullable', 'image', 'max:2048'],
                'password' => ['nullable', 'confirmed', 'min:8'], // كلمة المرور اختيارية
            ]);
    
            $doctor = Doctor::where('user_id', Auth::id())->first();
            $user = User::find(Auth::id());
    
            // تحديث الصورة إذا تم تحميلها
            if ($request->hasFile('image')) {
                // حذف الصورة القديمة إذا كانت موجودة
                if ($doctor->image && File::exists(public_path('storage/' . $doctor->image))) {
                    File::delete(public_path('storage/' . $doctor->image));
                }
    
                // تحميل الصورة الجديدة
                $path = $request->file('image')->store('uploads', 'public');
                $doctor->image = $path;
            }
    
            // تحديث بيانات الطبيب
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->phone = $request->phone;
            $doctor->save();
    
            // تحديث بيانات المستخدم
            $user->name = $request->name;
            $user->email = $request->email;
    
            // تحديث كلمة المرور إذا تم إدخالها
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
                $doctor->password= Hash::make($request->password);
            }
    
            $user->save();
    
            toastr()->success('تم تحديث البيانات بنجاح !');
            return redirect()->back();
        }
    


}



