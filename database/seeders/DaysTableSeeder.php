<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('daye')->delete();
              $days = [
            ['name' => 'السبت'],
            ['name' => 'الأحد'],
            ['name' => 'الاثنين'],
            ['name' => 'الثلاثاء'],
            ['name' => 'الأربعاء'],
            ['name' => 'الخميس'],
            ['name' => 'الجمعة'],
        ];

        foreach ($days as $day) {
            Day::create($day);
        }
    }
}






// use App\Models\Day;
// use Illuminate\Database\Seeder;

// class DaysTableSeeder extends Seeder
// {
//     public function run()
//     {
//         $days = [
//             ['name' => 'السبت'],
//             ['name' => 'الأحد'],
//             ['name' => 'الاثنين'],
//             ['name' => 'الثلاثاء'],
//             ['name' => 'الأربعاء'],
//             ['name' => 'الخميس'],
//             ['name' => 'الجمعة'],
//         ];

//         foreach ($days as $day) {
//             Day::create($day);
//         }
//     }
// }