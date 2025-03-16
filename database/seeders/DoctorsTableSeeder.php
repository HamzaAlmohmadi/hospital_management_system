<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->insert([
            [
                'name' => 'د. فاطمة علي',
                'email' => 'doctor1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '0123456789',
                'image' => null,
                'status' => 1,
                'user_id' => 2, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'section_id' => 1, // مرتبط بقسم الأسنان
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. أحمد ياسين',
                'email' => 'doctor2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '0123456788',
                'image' => null,
                'status' => 1,
                'user_id' => 3, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'section_id' => 2, // مرتبط بقسم المخ والأعصاب
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            
            
            [
                'name' => 'د. ليلى حسن',
                'email' => 'doctor3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'phone' => '0123456787',
                'image' => null,
                'status' => 1,
                'user_id' => 4, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'section_id' => 3, // مرتبط بقسم الجراحة
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'name' => 'د. خالد سليمان',
            //     'email' => 'doctor4@gmail.com',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('12345678'),
            //     'phone' => '0123456786',
            //     'image' => null,
            //     'status' => 1,
            //     'user_id' => 5, // يجب أن يكون هذا المعرف موجودًا في جدول users
            //     'section_id' => 4, // مرتبط بقسم الأطفال
            //     'remember_token' => null,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
            // [
            //     'name' => 'د. سارة عبد الرحمن',
            //     'email' => 'doctor5@gmail.com',
            //     'email_verified_at' => now(),
            //     'password' => Hash::make('12345678'),
            //     'phone' => '0123456785',
            //     'image' => null,
            //     'status' => 1,
            //     'user_id' => 6, // يجب أن يكون هذا المعرف موجودًا في جدول users
            //     'section_id' => 5, // مرتبط بقسم الأشعة
            //     'remember_token' => null,
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}




