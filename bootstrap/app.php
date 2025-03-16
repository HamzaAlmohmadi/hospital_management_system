<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // تسجيل ملف الروتات الخاص بمنطقة الإدارة
            Route::middleware(['web', 'auth']) // تطبيق Middleware هنا
                ->prefix('admin') // كل الروتات تبدأ بـ /admin
                ->as('admin.') // كل أسماء الروتات تبدأ بـ admin.
                ->group(base_path('routes/admin.php'));

            // تسجيل ملف الروتات الخاص بمنطقة الأطباء
            Route::middleware(['web', 'auth']) // تطبيق Middleware هنا
                ->prefix('doctor') // كل الروتات تبدأ بـ /admin
                ->as('doctor.') // كل أسماء الروتات تبدأ بـ admin.
                ->group(base_path('routes/doctor.php'));
            
            //تسجيل ملف الروتات الخاص بمنطقة  موضفين الاشعة 
            Route::middleware(['web', 'auth']) // تطبيق Middleware هنا
                ->prefix('ray') // كل الروتات تبدأ بـ /admin
                ->as('ray.') // كل أسماء الروتات تبدأ بـ admin.
                ->group(base_path('routes/ray.php'));

            //تسجيل ملف الروتات الخاص بمنطقة  موضفين  المختبر 
            Route::middleware(['web', 'auth']) // تطبيق Middleware هنا
                ->prefix('lab') // كل الروتات تبدأ بـ /admin
                ->as('lab.') // كل أسماء الروتات تبدأ بـ admin.
                ->group(base_path('routes/lab.php'));


            
            // تسجيل ملف الروتات الخاص بمنطقة المستخدمين
            Route::middleware(['web', 'auth']) // تطبيق Middleware هنا
                ->prefix('patient') // كل الروتات تبدأ بـ /admin
                ->as('patient.') // كل أسماء الروتات تبدأ بـ admin.
                ->group(base_path('routes/patient.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'checkRole' => \App\Http\Middleware\CheckUserRole::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
