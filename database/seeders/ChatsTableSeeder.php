<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chats')->insert([
            [
                'sender_id' => 1, // ربط بجدول users (أحمد محمد)
                'receiver_id' => 2, // ربط بجدول users (فاطمة علي)
                'message' => 'مرحبًا، هل يمكنك إرسال تقرير الأشعة السينية؟', // الرسالة
                'seen' => 0, // لم يتم الاطلاع
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 2, // فاطمة علي
                'receiver_id' => 1, // أحمد محمد
                'message' => 'بالطبع، سأرسل التقرير خلال دقائق.', // الرسالة
                'seen' => 1, // تم الاطلاع
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 3, // خالد سعيد
                'receiver_id' => 4, // ليلى محمود
                'message' => 'هل يمكنك إعادة جدولة موعدي؟', // الرسالة
                'seen' => 0, // لم يتم الاطلاع
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 4, // ليلى محمود
                'receiver_id' => 3, // خالد سعيد
                'message' => 'نعم، يمكنني تغيير الموعد إلى يوم الخميس.', // الرسالة
                'seen' => 1, // تم الاطلاع
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 5, // محمد حسن
                'receiver_id' => 1, // أحمد محمد
                'message' => 'هل يمكنني الحصول على نسخة من الفاتورة؟', // الرسالة
                'seen' => 0, // لم يتم الاطلاع
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}




