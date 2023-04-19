<?php

namespace Database\Seeders;

use Database\Seeders\Deploy\AdminMenuTableSeeder;
use Illuminate\Database\Seeder;

/**
 * 部署程式码后执行，加入的 Seeder 必须有幂等性(重复执行的结果相同)
 * Class DeploySeeder
 * @package Database\Seeders
 */
class DeploySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminMenuTableSeeder::class);
    }
}
