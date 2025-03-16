<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsurancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('insurances')->insert([
            [
                'name' => 'تأمين الصحي الأول',
                'notes' => 'هذا التأمين يغطي الفحوصات الطبية الأساسية والاستشارات.',
                'insurance_code' => 'INS001',
                'discount_percentage' => '10%',
                'Company_rate' => '5%',
                'status' => 1, // مفعل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'تأمين الأشعة والتحاليل',
                'notes' => 'هذا التأمين يغطي خدمات الأشعة والتحاليل المخبرية.',
                'insurance_code' => 'INS002',
                'discount_percentage' => '15%',
                'Company_rate' => '7%',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'تأمين العمليات الجراحية',
                'notes' => 'هذا التأمين يغطي تكاليف العمليات الجراحية البسيطة.',
                'insurance_code' => 'INS003',
                'discount_percentage' => '20%',
                'Company_rate' => '10%',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'تأمين العناية المركزة',
                'notes' => 'هذا التأمين يغطي تكاليف العناية المركزة للمرضى.',
                'insurance_code' => 'INS004',
                'discount_percentage' => '12%',
                'Company_rate' => '6%',
                'status' => 0, // غير مفعل
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'تأمين الاستشارات المتخصصة',
                'notes' => 'هذا التأمين يغطي تكاليف الاستشارات الطبية المتخصصة.',
                'insurance_code' => 'INS005',
                'discount_percentage' => '8%',
                'Company_rate' => '4%',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}



