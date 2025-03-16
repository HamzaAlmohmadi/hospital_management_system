<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            [
                'name' => 'مجموعة الفحوصات الطبية',
                'notes' => 'هذه المجموعة تشمل الفحوصات الطبية الأساسية.',
                'Total_before_discount' => 1000.00,
                'discount_value' => 100.00,
                'Total_after_discount' => 900.00,
                'tax_rate' => '15%',
                'Total_with_tax' => 1035.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مجموعة الأشعة والتحاليل',
                'notes' => 'هذه المجموعة تشمل خدمات الأشعة والتحاليل المخبرية.',
                'Total_before_discount' => 2000.00,
                'discount_value' => 200.00,
                'Total_after_discount' => 1800.00,
                'tax_rate' => '15%',
                'Total_with_tax' => 2070.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مجموعة العمليات الجراحية',
                'notes' => 'هذه المجموعة تشمل تكاليف العمليات الجراحية البسيطة.',
                'Total_before_discount' => 5000.00,
                'discount_value' => 500.00,
                'Total_after_discount' => 4500.00,
                'tax_rate' => '15%',
                'Total_with_tax' => 5175.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مجموعة العناية المركزة',
                'notes' => 'هذه المجموعة تشمل تكاليف العناية المركزة للمرضى.',
                'Total_before_discount' => 3000.00,
                'discount_value' => 300.00,
                'Total_after_discount' => 2700.00,
                'tax_rate' => '15%',
                'Total_with_tax' => 3105.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مجموعة الاستشارات الطبية',
                'notes' => 'هذه المجموعة تشمل تكاليف الاستشارات الطبية المتخصصة.',
                'Total_before_discount' => 1500.00,
                'discount_value' => 150.00,
                'Total_after_discount' => 1350.00,
                'tax_rate' => '15%',
                'Total_with_tax' => 1552.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}






