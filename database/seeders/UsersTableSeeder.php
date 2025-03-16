<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // المدير
            [
                'name' => 'أحمد محمد',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // الأطباء
            [
                'name' => 'د. فاطمة علي',
                'email' => 'doctor1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'doctor',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. أحمد ياسين',
                'email' => 'doctor2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'doctor',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'د. ليلى حسن',
                'email' => 'doctor3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'doctor',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // موظفو المختبر
            [
                'name' => 'محمد خالد',
                'email' => 'lab1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'laboratorie_employee',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'سعيد عبد الله',
                'email' => 'lab2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'laboratorie_employee',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مها عبد الرحمن',
                'email' => 'lab3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'laboratorie_employee',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // موظفو الأشعة
            [
                'name' => 'ليلى محمود',
                'email' => 'ray1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'ray_employee',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'علي ناصر',
                'email' => 'ray2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'ray_employee',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'نهى سامي',
                'email' => 'ray3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'ray_employee',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            // المرضى
            [
                'name' => 'خالد سعيد',
                'email' => 'patient1@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'patient',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'منى عبد الله',
                'email' => 'patient2@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'patient',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ياسر محمود',
                'email' => 'patient3@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'patient',
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}







