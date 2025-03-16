<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LaboratorieEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laboratorie_employees')->insert([
            [
                'name' => 'محمد خالد',
                'email' => 'lab1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'user_id' => 5, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سعيد عبد الله',
                'email' => 'lab2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'user_id' => 6, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مها عبد الرحمن',
                'email' => 'lab3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'user_id' => 7, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}



