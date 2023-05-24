<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Lwwcas\LaravelCountries\Database\Seeders\LcDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LcDatabaseSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
