<?php

namespace Database\Seeders;

use Database\Seeders\Deploy\AdminMenuTableSeeder;
use Database\Seeders\Init\MyAdminTablesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MyAdminTablesSeeder::class);
        $this->call(AdminMenuTableSeeder::class);
    }
}
