<?php

namespace Database\Seeders;

use App\Enums\JobTitleEnum;
use App\Models\Announcement;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

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

        $this->createUsers();
    }

    private function createUser($name, int $job): void
    {
        $murphy = new User();
        $murphy->account = $name;
        $murphy->password = Hash::make($name);
        $murphy->name = ucfirst($name);
        $murphy->age = random_int(20, 40);
        $murphy->job = $job;
        $murphy->email = $name.'@gmail.com';
        $murphy->phone = $this->generatePhone();
        $murphy->save();
    }

    private function generatePhone()
    {
        $numbers = range(0, 9);
        $result = [];

        for ($i = 0; $i < 8; $i++) {
            $result[] = Arr::random($numbers);
        }

        return '09'. implode('', $result);
    }

    /**
     * @return void
     */
    private function createUsers(): void
    {
        $this->createUser('murphy', JobTitleEnum::BACKEND_ENGINEER);
        $this->createUser('dana', JobTitleEnum::PRODUCT_MANAGER);
        $this->createUser('cave', JobTitleEnum::FRONTEND_ENGINEER);
        $this->createUser('joyce', JobTitleEnum::ASSISTANT);
        $this->createUser('judy', JobTitleEnum::PRODUCT_MANAGER);
        $this->createUser('roy', JobTitleEnum::BACKEND_ENGINEER);

        $this->createUser('otis', JobTitleEnum::BACKEND_ENGINEER);
        $this->createUser('brian', JobTitleEnum::BACKEND_ENGINEER);
        $this->createUser('henry', JobTitleEnum::FRONTEND_ENGINEER);
        $this->createUser('tina', JobTitleEnum::ASSISTANT);
    }
}
