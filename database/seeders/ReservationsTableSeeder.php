<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
                'name' => 'أحمد محمد',
                'email' => 'ahmed.mohamed@example.com',
                'phone' => '0123456789',
                'status' => 'في الانتضار', // حالة الحجز
                'notes' => 'أحتاج إلى موعد مع الطبيب لفحص دوري.', // ملاحظات
                'reservation' => Carbon::create('2023-10-15 10:00:00'), // تاريخ ووقت الحجز
                'doctor_id' => 1, // ربط بجدول doctors (د. أحمد محمد)
                'section_id' => 1, // ربط بجدول sections (قسم الطوارئ)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فاطمة علي',
                'email' => 'fatima.ali@example.com',
                'phone' => '0111222333',
                'status' => 'تم التأكيد',
                'notes' => 'أحتاج إلى استشارة طبية متخصصة.',
                'reservation' => Carbon::create('2023-10-16 14:00:00'),
                'doctor_id' => 2, // د. فاطمة علي
                'section_id' => 2, // قسم العناية المركزة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'خالد سعيد',
                'email' => 'khaled.saeed@example.com',
                'phone' => '0100555666',
                'status' => 'مرفوض',
                'notes' => 'تم رفض الحجز بسبب عدم توفر المواعيد.',
                'reservation' => null, // لم يتم تحديد موعد
                'doctor_id' => 3, // د. خالد سعيد
                'section_id' => 3, // قسم الجراحة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ليلى محمود',
                'email' => 'layla.mahmoud@example.com',
                'phone' => '0155666777',
                'status' => 'في الانتضار',
                'notes' => 'أحتاج إلى فحص طبي لأطفالي.',
                'reservation' => Carbon::create('2023-10-17 09:00:00'),
                'doctor_id' => 1, // د. ليلى محمود
                'section_id' => 4, // قسم الأطفال
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'محمد حسن',
                'email' => 'mohamed.hassan@example.com',
                'phone' => '0122333444',
                'status' => 'تم التأكيد',
                'notes' => 'أحتاج إلى أشعة سينية على الصدر.',
                'reservation' => Carbon::create('2023-10-18 11:00:00'),
                'doctor_id' => 1, // د. محمد حسن
                'section_id' => 5, // قسم الأشعة
                'created_at' => now(),
                'updated_at' => now(),
            ],



            [
                'name' => 'أحمد محمد',
                'email' => 'ahmed@gmail.com',
                'phone' => '0512345678',
                'status' => 'في الانتضار',
                'notes' => 'حجز عادي',
                'reservation' => '2023-10-25 10:00:00',
                'doctor_id' => 1, // الطبيب الأول
                'section_id' => 1, // القسم الأول
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'فاطمة علي',
                'email' => 'fatima@gmail.com',
                'phone' => '0512345679',
                'status' => 'تم التأكيد',
                'notes' => 'حجز عاجل',
                'reservation' => '2023-10-26 11:00:00',
                'doctor_id' => 2, // الطبيب الثاني
                'section_id' => 2, // القسم الثاني
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'خالد سعيد',
                'email' => 'khaled@gmail.com',
                'phone' => '0512345680',
                'status' => 'مرفوض',
                'notes' => 'غير متاح',
                'reservation' => '2023-10-27 09:00:00',
                'doctor_id' => 3, // الطبيب الثالث
                'section_id' => 3, // القسم الثالث
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ليلى حسن',
                'email' => 'layla@gmail.com',
                'phone' => '0512345681',
                'status' => 'في الانتضار',
                'notes' => 'حجز عادي',
                'reservation' => '2023-10-28 12:00:00',
                'doctor_id' => 2, // الطبيب الرابع
                'section_id' => 4, // القسم الرابع
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سارة عبد الرحمن',
                'email' => 'sara@gmail.com',
                'phone' => '0512345682',
                'status' => 'تم التأكيد',
                'notes' => 'حجز عاجل',
                'reservation' => '2023-10-29 14:00:00',
                'doctor_id' => 3, // الطبيب الخامس
                'section_id' => 5, // القسم الخامس
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'محمد خالد',
                'email' => 'mohamed@gmail.com',
                'phone' => '0512345683',
                'status' => 'في الانتضار',
                'notes' => 'حجز عادي',
                'reservation' => '2023-10-30 15:00:00',
                'doctor_id' => 1, // الطبيب الأول
                'section_id' => 1, // القسم الأول
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'منى عبد الله',
                'email' => 'mona@gmail.com',
                'phone' => '0512345684',
                'status' => 'تم التأكيد',
                'notes' => 'حجز عاجل',
                'reservation' => '2023-10-31 16:00:00',
                'doctor_id' => 2, // الطبيب الثاني
                'section_id' => 2, // القسم الثاني
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ياسر محمود',
                'email' => 'yasser@gmail.com',
                'phone' => '0512345685',
                'status' => 'مرفوض',
                'notes' => 'غير متاح',
                'reservation' => '2023-11-01 17:00:00',
                'doctor_id' => 3, // الطبيب الثالث
                'section_id' => 3, // القسم الثالث
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'نهى سامي',
                'email' => 'noha@gmail.com',
                'phone' => '0512345686',
                'status' => 'في الانتضار',
                'notes' => 'حجز عادي',
                'reservation' => '2023-11-02 18:00:00',
                'doctor_id' => 2, // الطبيب الرابع
                'section_id' => 4, // القسم الرابع
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'علي ناصر',
                'email' => 'ali@gmail.com',
                'phone' => '0512345687',
                'status' => 'تم التأكيد',
                'notes' => 'حجز عاجل',
                'reservation' => '2023-11-03 19:00:00',
                'doctor_id' => 1, // الطبيب الخامس
                'section_id' => 5, // القسم الخامس
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}





