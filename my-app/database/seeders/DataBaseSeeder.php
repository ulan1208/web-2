<?php

use Illuminate\Database\Seeder;
use Database\Seeders\RuangSeeder;
use Database\Seeders\UnitKerjaSeeder;
use Database\Seeders\PegawaiSeeder;
use Database\Seeders\PeminjamanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RuangSeeder::class,
            UnitKerjaSeeder::class,
            PegawaiSeeder::class,
            PeminjamanSeeder::class,
        ]);
    }
}
