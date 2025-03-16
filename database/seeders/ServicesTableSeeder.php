<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('services')->insert([
            [
                'name' => 'فحص عام',
                'price' => 150.00,
                'description' => 'فحص طبي عام يشمل تقييم الحالة الصحية العامة للمريض.',
                'status' => 1, // مفعل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'أشعة سينية',
                'price' => 300.00,
                'description' => 'خدمة الأشعة السينية لتشخيص الكسور أو الأمراض الداخلية.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'تحاليل الدم',
                'price' => 200.00,
                'description' => 'تحاليل دم شاملة لتقييم الصحة العامة واكتشاف الأمراض.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'جراحة بسيطة',
                'price' => 1000.00,
                'description' => 'إجراء جراحي بسيط مثل إزالة الأورام الصغيرة أو الخياطة.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'استشارة طبية متخصصة',
                'price' => 500.00,
                'description' => 'استشارة مع طبيب متخصص في مجال معين مثل القلب أو الأعصاب.',
                'status' => 0, // غير مفعل
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}



