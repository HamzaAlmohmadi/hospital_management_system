<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('patients')->insert([
            [
                'name' => 'خالد سعيد',
                'Address' => 'شارع الملك فهد، الرياض',
                'email' => 'patient1@gmail.com',
                'password' => Hash::make('12345678'),
                'Date_Birth' => '1990-05-15',
                'user_id' => 11, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'Phone' => '0512345678',
                'Gender' => 'ذكر',
                'Blood_Group' => 'O+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'منى عبد الله',
                'Address' => 'شارع العليا، جدة',
                'email' => 'patient2@gmail.com',
                'password' => Hash::make('12345678'),
                'Date_Birth' => '1985-10-22',
                'user_id' => 12, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'Phone' => '0512345679',
                'Gender' => 'أنثى',
                'Blood_Group' => 'A-',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ياسر محمود',
                'Address' => 'شارع التحلية، الدمام',
                'email' => 'patient3@gmail.com',
                'password' => Hash::make('12345678'),
                'Date_Birth' => '1978-03-30',
                'user_id' => 13, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'Phone' => '0512345680',
                'Gender' => 'ذكر',
                'Blood_Group' => 'B+',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}






