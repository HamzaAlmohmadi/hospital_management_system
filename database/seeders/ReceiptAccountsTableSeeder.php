<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReceiptAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('receipt_accounts')->insert([
            [
                'date' => Carbon::create('2023-10-01'), // تاريخ الإيصال
                'patient_id' => 1, // ربط بجدول patients (أحمد محمد)
                'amount' => 500.00, // المبلغ
                'description' => 'دفعة مقدمة لخدمات الفحص العام',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => Carbon::create('2023-10-02'),
                'patient_id' => 2, // فاطمة علي
                'amount' => 300.00,
                'description' => 'دفع تكاليف الأشعة السينية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => Carbon::create('2023-10-03'),
                'patient_id' => 3, // خالد سعيد
                'amount' => 1000.00,
                'description' => 'دفع تكاليف جراحة بسيطة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => Carbon::create('2023-10-04'),
                'patient_id' => 2, // ليلى محمود
                'amount' => 200.00,
                'description' => 'دفع تكاليف تحاليل الدم',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => Carbon::create('2023-10-05'),
                'patient_id' => 3, // محمد حسن
                'amount' => 700.00,
                'description' => 'دفع تكاليف استشارة طبية متخصصة',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-01',
                'patient_id' => 1, // يجب أن يكون هذا المعرف موجودًا في جدول patients
                'amount' => 500.00,
                'description' => 'دفعة مقدمة لعلاج الأسنان',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-05',
                'patient_id' => 2, // يجب أن يكون هذا المعرف موجودًا في جدول patients
                'amount' => 300.00,
                'description' => 'دفعة مقابل استشارة طبية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-10',
                'patient_id' => 3, // يجب أن يكون هذا المعرف موجودًا في جدول patients
                'amount' => 700.00,
                'description' => 'دفعة مقابل عملية جراحية',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}






