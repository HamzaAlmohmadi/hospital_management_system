<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // تحقق من أن المستخدم مسجل دخول
        if (Auth::check()) {
            $user = Auth::user();

            // توجيه المستخدم بناءً على الدور
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;

                case 'doctor':
                    return redirect()->route('doctor.dashboard');
                    break;

                case 'laboratorie_employee':
                    return redirect()->route('laboratorie.dashboard');
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

        // إذا لم يكن المستخدم مسجل دخول، انتقل إلى الصفحة التالية
        return $next($request);
    }
}

