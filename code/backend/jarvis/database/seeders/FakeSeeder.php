<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Banner;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::factory()->count(20)->create();
        Announcement::factory()->count(20)->create();
    }
}
