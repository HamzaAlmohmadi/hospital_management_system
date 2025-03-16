<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('invoices')->insert([
            [
                'invoice_type' => 1, // نوع الفاتورة (1: نقدي، 2: آجل)
                'invoice_date' => Carbon::create('2023-10-01'), // تاريخ الفاتورة
                'patient_id' => 1, // ربط بجدول patients (أحمد محمد)
                'doctor_id' => 1, // ربط بجدول doctors (د. أحمد محمد)
                'section_id' => 1, // ربط بجدول sections (قسم الطوارئ)
                'Group_id' => 1, // ربط بجدول groups (مجموعة الفحوصات الطبية)
                'Service_id' => null, // لا يوجد خدمة محددة
                'price' => 500.00, // السعر
                'discount_value' => 50.00, // قيمة الخصم
                'tax_rate' => '15%', // نسبة الضريبة
                'tax_value' => '67.50', // قيمة الضريبة
                'total_with_tax' => 517.50, // الإجمالي مع الضريبة
                'type' => 1, // نوع الفاتورة (1: عادية، 2: إلكترونية)
                'invoice_status' => 1, // حالة الفاتورة (1: مدفوعة، 2: غير مدفوعة)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_type' => 1, // نوع الفاتورة (1: نقدي، 2: آجل)
                'invoice_date' => Carbon::create('2023-10-01'), // تاريخ الفاتورة
                'patient_id' => 1, // ربط بجدول patients (أحمد محمد)
                'doctor_id' => 1, // ربط بجدول doctors (د. أحمد محمد)
                'section_id' => 1, // ربط بجدول sections (قسم الطوارئ)
                'Group_id' => 1, // ربط بجدول groups (مجموعة الفحوصات الطبية)
                'Service_id' => null, // لا يوجد خدمة محددة
                'price' => 500.00, // السعر
                'discount_value' => 50.00, // قيمة الخصم
                'tax_rate' => '15%', // نسبة الضريبة
                'tax_value' => '67.50', // قيمة الضريبة
                'total_with_tax' => 517.50, // الإجمالي مع الضريبة
                'type' => 1, // نوع الفاتورة (1: عادية، 2: إلكترونية)
                'invoice_status' => 1, // حالة الفاتورة (1: مدفوعة، 2: غير مدفوعة)
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'invoice_type' => 1, // نوع الفاتورة (1: نقدي، 2: آجل)
                'invoice_date' => Carbon::create('2023-10-01'), // تاريخ الفاتورة
                'patient_id' => 1, // ربط بجدول patients (أحمد محمد)
                'doctor_id' => 1, // ربط بجدول doctors (د. أحمد محمد)
                'section_id' => 1, // ربط بجدول sections (قسم الطوارئ)
                'Group_id' => 1, // ربط بجدول groups (مجموعة الفحوصات الطبية)
                'Service_id' => null, // لا يوجد خدمة محددة
                'price' => 500.00, // السعر
                'discount_value' => 50.00, // قيمة الخصم
                'tax_rate' => '15%', // نسبة الضريبة
                'tax_value' => '67.50', // قيمة الضريبة
                'total_with_tax' => 517.50, // الإجمالي مع الضريبة
                'type' => 1, // نوع الفاتورة (1: عادية، 2: إلكترونية)
                'invoice_status' => 1, // حالة الفاتورة (1: مدفوعة، 2: غير مدفوعة)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_type' => 2, // فاتورة آجلة
                'invoice_date' => Carbon::create('2023-10-02'),
                'patient_id' => 2, // فاطمة علي
                'doctor_id' => 2, // د. فاطمة علي
                'section_id' => 2, // قسم العناية المركزة
                'Group_id' => null, // لا يوجد مجموعة محددة
                'Service_id' => 2, // ربط بجدول services (أشعة سينية)
                'price' => 300.00,
                'discount_value' => 30.00,
                'tax_rate' => '15%',
                'tax_value' => '40.50',
                'total_with_tax' => 310.50,
                'type' => 1,
                'invoice_status' => 2, // غير مدفوعة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_type' => 1,
                'invoice_date' => Carbon::create('2023-10-03'),
                'patient_id' => 3, // خالد سعيد
                'doctor_id' => 3, // د. خالد سعيد
                'section_id' => 3, // قسم الجراحة
                'Group_id' => 3, // مجموعة العمليات الجراحية
                'Service_id' => null,
                'price' => 1000.00,
                'discount_value' => 100.00,
                'tax_rate' => '15%',
                'tax_value' => '135.00',
                'total_with_tax' => 1035.00,
                'type' => 2, // فاتورة إلكترونية
                'invoice_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],



            [
                'invoice_type' => 1, // فاتورة نقدية
                'invoice_date' => '2023-10-01',
                'patient_id' => 1, // المريض الأول
                'doctor_id' => 1, // الطبيب الأول
                'section_id' => 1, // القسم الأول
                'Group_id' => 1, // المجموعة الأولى (اختياري)
                'Service_id' => 1, // الخدمة الأولى (اختياري)
                'price' => 500.00,
                'discount_value' => 50.00,
                'tax_rate' => '15%',
                'tax_value' => '67.50',
                'total_with_tax' => 517.50,
                'type' => 1, // فاتورة عادية
                'invoice_status' => 1, // مدفوعة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_type' => 2, // فاتورة آجلة
                'invoice_date' => '2023-10-05',
                'patient_id' => 2, // المريض الثاني
                'doctor_id' => 2, // الطبيب الثاني
                'section_id' => 2, // القسم الثاني
                'Group_id' => 2, // المجموعة الثانية (اختياري)
                'Service_id' => 2, // الخدمة الثانية (اختياري)
                'price' => 700.00,
                'discount_value' => 70.00,
                'tax_rate' => '15%',
                'tax_value' => '94.50',
                'total_with_tax' => 724.50,
                'type' => 1, // فاتورة عادية
                'invoice_status' => 2, // غير مدفوعة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'invoice_type' => 1, // فاتورة نقدية
                'invoice_date' => '2023-10-10',
                'patient_id' => 3, // المريض الثالث
                'doctor_id' => 3, // الطبيب الثالث
                'section_id' => 3, // القسم الثالث
                'Group_id' => 3, // المجموعة الثالثة (اختياري)
                'Service_id' => 3, // الخدمة الثالثة (اختياري)
                'price' => 1000.00,
                'discount_value' => 100.00,
                'tax_rate' => '15%',
                'tax_value' => '135.00',
                'total_with_tax' => 1035.00,
                'type' => 1, // فاتورة عادية
                'invoice_status' => 1, // مدفوعة
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}


