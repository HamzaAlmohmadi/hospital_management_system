<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            UsersTableSeeder::class,
            SectionsTableSeeder::class,
            DoctorsTableSeeder::class,
            DaysTableSeeder::class,
            DayDoctorTableSeeder::class,
            
            PatientsTableSeeder::class,
            ServicesTableSeeder::class,
            GroupsTableSeeder::class,
            ServiceGroupTableSeeder::class,

            ReceiptAccountsTableSeeder::class,
            InvoicesTableSeeder::class,
            PaymentAccountsTableSeeder::class,
            PatientAccountsTableSeeder::class,
            DiagnosticsTableSeeder::class,
            RayEmployeesTableSeeder::class,
            RaysTableSeeder::class,
            LaboratorieEmployeesTableSeeder::class,
            LaboratoriesTableSeeder::class,
            InsurancesTableSeeder::class,
            AmbulancesTableSeeder::class,
            ReservationsTableSeeder::class,
        ]);


        
    }
}
