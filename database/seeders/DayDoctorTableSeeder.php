<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayDoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('day_doctor')->insert([
            [
                'doctor_id' => 1, // د. فاطمة علي
                'day_id' => 1, // السبت
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 1, // د. فاطمة علي
                'day_id' => 2, // الأحد
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 2, // د. أحمد ياسين
                'day_id' => 3, // الاثنين
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 2, // د. أحمد ياسين
                'day_id' => 4, // الثلاثاء
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 3, // د. ليلى حسن
                'day_id' => 5, // الأربعاء
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 3, // د. ليلى حسن
                'day_id' => 6, // الخميس
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 1, // د. خالد سليمان
                'day_id' => 7, // الجمعة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 1, // د. سارة عبد الرحمن
                'day_id' => 3, // السبت
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
