<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_accounts')->insert([
            [
                'date' => '2023-10-01',
                'patient_id' => 1, // المريض الأول
                'amount' => 200.00,
                'description' => 'دفعة مقدمة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-05',
                'patient_id' => 2, // المريض الثاني
                'amount' => 150.00,
                'description' => 'دفعة مقابل استشارة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-10',
                'patient_id' => 3, // المريض الثالث
                'amount' => 300.00,
                'description' => 'دفعة مقابل عملية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}




