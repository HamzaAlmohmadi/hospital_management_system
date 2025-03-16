<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(LoginRequest $request): RedirectResponse
    {
        // تحقق من صحة بيانات الدخول
        $request->authenticate();
    
        // إنشاء جلسة جديدة
        $request->session()->regenerate();
    
        // توجيه المستخدم بناءً على الدور
        $user = Auth::user(); // الحصول على بيانات المستخدم المسجل دخول
        
                    // توجيه المستخدم بناءً على الدور
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;

                case 'doctor':
                    return redirect()->route('doctor.dashboard');
                    break;

                case 'laboratorie_employee':
                    return redirect()->route('lab.dashboard');
                    break;

                case 'ray_employee':
                    return redirect()->route('ray.dashboard');
                    break;

                case 'patient':
                    return redirect()->route('patient.dashboard');
                    break;

                default:
                    return redirect()->route('home'); // الصفحة الرئيسية كحالة افتراضية
                    break;
            }
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
