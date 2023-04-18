<?php

namespace Database\Factories;

use App\Models\Announcement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AnnouncementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Announcement::class;

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
            'title' => 'announcement:'.Str::random(6),
            'content' => $this->faker->sentence(),
            'start_date_time' => $startTime,
            'end_date_time' => $endTime,
            'enabled' => 1,
            'order' => random_int(1, 9),
            'is_show_in_announce_page' => random_int(0, 1),
            'is_popup' => random_int(0, 1),
            'is_important' => random_int(0, 1),
            'is_show_scrolling_text' => random_int(0, 1),
        ];
    }
}
