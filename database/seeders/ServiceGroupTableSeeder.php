<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service_group')->insert([
            [
                'Group_id' => 1, // مجموعة الفحوصات الطبية
                'Service_id' => 1, // فحص عام
                'quantity' => 2, // الكمية
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Group_id' => 1, // مجموعة الفحوصات الطبية
                'Service_id' => 3, // تحاليل الدم
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Group_id' => 2, // مجموعة الأشعة والتحاليل
                'Service_id' => 2, // أشعة سينية
                'quantity' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Group_id' => 2, // مجموعة الأشعة والتحاليل
                'Service_id' => 3, // تحاليل الدم
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Group_id' => 3, // مجموعة العمليات الجراحية
                'Service_id' => 4, // جراحة بسيطة
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Group_id' => 4, // مجموعة العناية المركزة
                'Service_id' => 1, // فحص عام
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Group_id' => 5, // مجموعة الاستشارات الطبية
                'Service_id' => 5, // استشارة طبية متخصصة
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

