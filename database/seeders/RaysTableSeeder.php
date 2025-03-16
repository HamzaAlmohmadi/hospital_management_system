<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rays')->insert([
            [
                'description' => 'يحتاج المريض إلى أشعة سينية على الصدر لتشخيص التهاب الرئة.', // وصف الطبيب
                'invoice_id' => 1, // ربط بجدول invoices (فاتورة 1)
                'patient_id' => 1, // ربط بجدول patients (أحمد محمد)
                'doctor_id' => 1, // ربط بجدول doctors (د. أحمد محمد)
                'employee_id' => 1, // ربط بجدول ray_employees (ليلى محمود)
                'description_employee' => 'تم إجراء الأشعة السينية وتبين وجود التهاب في الرئة.', // وصف موظف الأشعة
                'case' => 1, // الحالة (1: مكتمل، 0: قيد الانتظار)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'يحتاج المريض إلى أشعة مقطعية على الرأس لتشخيص إصابة في الدماغ.',
                'invoice_id' => 2, // ربط بجدول invoices (فاتورة 2)
                'patient_id' => 2, // ربط بجدول patients (فاطمة علي)
                'doctor_id' => 2, // ربط بجدول doctors (د. فاطمة علي)
                'employee_id' => 2, // ربط بجدول ray_employees (أحمد سعيد)
                'description_employee' => 'تم إجراء الأشعة المقطعية وتبين وجود كدمة في الدماغ.',
                'case' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'description' => 'أشعة سينية على الصدر لتشخيص التهاب الرئة.',
                'invoice_id' => 1, // الفاتورة الأولى
                'patient_id' => 1, // المريض الأول
                'doctor_id' => 1, // الطبيب الأول
                'employee_id' => 1, // موظف الأشعة الأول (اختياري)
                'description_employee' => 'تم إجراء الأشعة بنجاح، النتائج جاهزة للفحص.',
                'case' => 1, // حالة مكتملة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'أشعة مقطعية على الرأس لتقييم إصابة الرأس.',
                'invoice_id' => 2, // الفاتورة الثانية
                'patient_id' => 2, // المريض الثاني
                'doctor_id' => 2, // الطبيب الثاني
                'employee_id' => 2, // موظف الأشعة الثاني (اختياري)
                'description_employee' => null, // لا يوجد وصف إضافي
                'case' => 0, // حالة قيد الانتظار
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'أشعة رنين مغناطيسي على العمود الفقري لتقييم الانزلاق الغضروفي.',
                'invoice_id' => 3, // الفاتورة الثالثة
                'patient_id' => 3, // المريض الثالث
                'doctor_id' => 3, // الطبيب الثالث
                'employee_id' => null, // لا يوجد موظف أشعة
                'description_employee' => null, // لا يوجد وصف إضافي
                'case' => 0, // حالة قيد الانتظار
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);


    }
}




