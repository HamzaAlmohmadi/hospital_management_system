<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DiagnosticsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('diagnostics')->insert([
            [
                'date' => '2023-10-01',
                'review_date' => '2023-10-10 10:00:00', // تاريخ المراجعة (اختياري)
                'diagnosis' => 'تشخيص المريض: يعاني من التهاب في الحلق وحمى خفيفة.',
                'medicine' => 'وصفة طبية: باراسيتامول 500 مجم كل 8 ساعات، غرغرة بالماء والملح.',
                'invoice_id' => 1, // الفاتورة الأولى
                'patient_id' => 1, // المريض الأول
                'doctor_id' => 1, // الطبيب الأول
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-05',
                'review_date' => '2023-10-15 11:00:00', // تاريخ المراجعة (اختياري)
                'diagnosis' => 'تشخيص المريض: يعاني من آلام في الظهر بسبب إجهاد عضلي.',
                'medicine' => 'وصفة طبية: مرهم موضعي لتخفيف الألم، راحة لمدة أسبوع.',
                'invoice_id' => 2, // الفاتورة الثانية
                'patient_id' => 2, // المريض الثاني
                'doctor_id' => 2, // الطبيب الثاني
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'date' => '2023-10-10',
                'review_date' => null, // لا يوجد تاريخ مراجعة
                'diagnosis' => 'تشخيص المريض: يعاني من صداع نصفي مزمن.',
                'medicine' => 'وصفة طبية: دواء الصداع النصفي، تجنب الإجهاد والتوتر.',
                'invoice_id' => 3, // الفاتورة الثالثة
                'patient_id' => 3, // المريض الثالث
                'doctor_id' => 3, // الطبيب الثالث
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}








