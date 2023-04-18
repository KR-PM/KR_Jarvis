<?php

namespace Database\Factories;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BannerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Banner::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (random_int(0, 1)) {
            $startTime = Carbon::now()->subDays(random_int(0, 3));
            $endTime = $startTime->addDays(random_int(1, 5));
        } else {
            $startTime = null;
            $endTime = null;
        }

        return [
            'name' => 'banner:'.Str::random(6),
            'destination_url' => $this->faker->url,
            'img_url' => $this->faker->imageUrl(200, 80, 'animals', true),
            'mobile_img_url' => $this->faker->imageUrl(200, 80, 'animals', true),
            'order' => random_int(1, 5),
            'enabled' => 1,
            'start_date_time' => $startTime,
            'end_date_time' => $endTime,
        ];
    }
}
