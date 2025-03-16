<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FundAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fund_accounts')->insert([
            [
                'date' => '2023-10-01',
                'invoice_id' => 1, // الفاتورة الأولى (اختياري)
                'receipt_id' => null, // لا يوجد إيصال
                'Payment_id' => null, // لا يوجد مدفوعات
                'Debit' => 500.00, // مدين
                'credit' => null, // لا يوجد دائن
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-05',
                'invoice_id' => null, // لا يوجد فاتورة
                'receipt_id' => 1, // الإيصال الأول (اختياري)
                'Payment_id' => null, // لا يوجد مدفوعات
                'Debit' => null, // لا يوجد مدين
                'credit' => 300.00, // دائن
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-10',
                'invoice_id' => 2, // الفاتورة الثانية (اختياري)
                'receipt_id' => null, // لا يوجد إيصال
                'Payment_id' => 1, // المدفوعات الأولى (اختياري)
                'Debit' => 700.00, // مدين
                'credit' => null, // لا يوجد دائن
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}




