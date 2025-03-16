<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('sections')->insert([
            [
                'name' => 'قسم الاسنان',
                'description' => 'قسم الطوارئ هو القسم المسؤول عن استقبال الحالات الحرجة وتقديم الرعاية الفورية.',
                'status' => 1, // مفعل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'قسم  المخ والاعصاب والاعصاب ',
                'description' => 'قسم العناية المركزة يقدم رعاية طبية مكثفة للمرضى الذين يعانون من حالات صحية خطيرة.',
                'status' => 1, // مفعل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'قسم الجراحة',
                'description' => 'قسم الجراحة مسؤول عن إجراء العمليات الجراحية للمرضى الذين يحتاجون إلى تدخل جراحي.',
                'status' => 1, // مفعل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'قسم الأطفال',
                'description' => 'قسم الأطفال يقدم الرعاية الطبية للأطفال والرضع، بما في ذلك التشخيص والعلاج.',
                'status' => 1, // مفعل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'قسم الأشعة',
                'description' => 'قسم الأشعة مسؤول عن إجراء الفحوصات التشخيصية باستخدام التكنولوجيا الحديثة مثل الأشعة السينية والرنين المغناطيسي.',
                'status' => 0, // غير مفعل (مثال)
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}



