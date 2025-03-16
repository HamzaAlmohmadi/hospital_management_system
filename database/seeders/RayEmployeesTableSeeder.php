<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RayEmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ray_employees')->insert([
            [
                'name' => 'ليلى محمود',
                'email' => 'ray1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'user_id' => 8, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'علي ناصر',
                'email' => 'ray2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'user_id' => 9, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'نهى سامي',
                'email' => 'ray3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'user_id' => 10, // يجب أن يكون هذا المعرف موجودًا في جدول users
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}



