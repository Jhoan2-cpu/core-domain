<?php

namespace IncadevUns\CoreDomain\Database\Seeders;

use Illuminate\Database\Seeder;

class IncadevSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AdministrativeSeeder::class,
            AcademicSeeder::class,
        ]);
    }
}
