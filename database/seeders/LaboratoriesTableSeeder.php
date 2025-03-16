<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboratoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laboratories')->insert([
            [
                'description' => 'يحتاج المريض إلى تحليل دم شامل لتشخيص فقر الدم.', // وصف الطبيب
                'invoice_id' => 1, // ربط بجدول invoices (فاتورة 1)
                'patient_id' => 1, // ربط بجدول patients (أحمد محمد)
                'doctor_id' => 1, // ربط بجدول doctors (د. أحمد محمد)
                'employee_id' => 1, // ربط بجدول laboratorie_employees (موظف المختبر 1)
                'description_employee' => 'تم إجراء تحليل الدم وتبين وجود نقص في الهيموجلوبين.', // وصف موظف المختبر
                'case' => 1, // الحالة (1: مكتمل، 0: قيد الانتظار)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'يحتاج المريض إلى تحليل بول لتشخيص التهاب المسالك البولية.',
                'invoice_id' => 2, // ربط بجدول invoices (فاتورة 2)
                'patient_id' => 2, // ربط بجدول patients (فاطمة علي)
                'doctor_id' => 2, // ربط بجدول doctors (د. فاطمة علي)
                'employee_id' => 2, // ربط بجدول laboratorie_employees (موظف المختبر 2)
                'description_employee' => 'تم إجراء تحليل البول وتبين وجود التهاب في المسالك البولية.',
                'case' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'description' => 'فحص دم شامل لتقييم مستوى الهيموجلوبين وخلايا الدم.',
                'invoice_id' => 1, // الفاتورة الأولى
                'patient_id' => 1, // المريض الأول
                'doctor_id' => 1, // الطبيب الأول
                'employee_id' => 1, // موظف المختبر الأول (اختياري)
                'description_employee' => 'تم إجراء الفحص بنجاح، النتائج جاهزة للفحص.',
                'case' => 1, // حالة مكتملة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'فحص بول لتقييم وجود التهابات أو مشاكل في الكلى.',
                'invoice_id' => 2, // الفاتورة الثانية
                'patient_id' => 2, // المريض الثاني
                'doctor_id' => 2, // الطبيب الثاني
                'employee_id' => 2, // موظف المختبر الثاني (اختياري)
                'description_employee' => null, // لا يوجد وصف إضافي
                'case' => 0, // حالة قيد الانتظار
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'description' => 'فحص سكر الدم لتقييم مستوى الجلوكوز.',
                'invoice_id' => 3, // الفاتورة الثالثة
                'patient_id' => 3, // المريض الثالث
                'doctor_id' => 3, // الطبيب الثالث
                'employee_id' => null, // لا يوجد موظف مختبر
                'description_employee' => null, // لا يوجد وصف إضافي
                'case' => 0, // حالة قيد الانتظار
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}







