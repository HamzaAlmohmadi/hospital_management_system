<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmbulancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ambulances')->insert([
            [
                'driver_name' => 'محمد علي',
                'notes' => 'سيارة إسعاف مجهزة بأحدث الأجهزة الطبية.',
                'car_number' => 'أ 1234',
                'car_model' => 'فورد ترانزيت',
                'car_year_made' => '2020',
                'driver_license_number' => '123456789',
                'driver_phone' => '0123456789',
                'is_available' => 1, // متاحة
                'car_type' => 1, // نوع السيارة (1: عادية، 2: مجهزة)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driver_name' => 'أحمد سعيد',
                'notes' => 'سيارة إسعاف مجهزة بوحدة عناية مركزة متنقلة.',
                'car_number' => 'ب 5678',
                'car_model' => 'مرسيدس سبرينتر',
                'car_year_made' => '2019',
                'driver_license_number' => '987654321',
                'driver_phone' => '0111222333',
                'is_available' => 1,
                'car_type' => 2, // سيارة مجهزة
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driver_name' => 'خالد محمود',
                'notes' => 'سيارة إسعاف عادية مناسبة للنقل العام.',
                'car_number' => 'ج 9101',
                'car_model' => 'نيسان NV350',
                'car_year_made' => '2021',
                'driver_license_number' => '456789123',
                'driver_phone' => '0100555666',
                'is_available' => 0, // غير متاحة
                'car_type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driver_name' => 'فاطمة حسن',
                'notes' => 'سيارة إسعاف مجهزة بأجهزة إنعاش متقدمة.',
                'car_number' => 'د 1121',
                'car_model' => 'فولكس فاجن كرافيل',
                'car_year_made' => '2018',
                'driver_license_number' => '321654987',
                'driver_phone' => '0155666777',
                'is_available' => 1,
                'car_type' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'driver_name' => 'علي محمد',
                'notes' => 'سيارة إسعاف عادية مناسبة للنقل السريع.',
                'car_number' => 'ه 3141',
                'car_model' => 'تويوتا هايس',
                'car_year_made' => '2022',
                'driver_license_number' => '654987321',
                'driver_phone' => '0122333444',
                'is_available' => 1,
                'car_type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}




