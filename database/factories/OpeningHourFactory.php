<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OpeningHour>
 */
class OpeningHourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'service_id' => Service::factory(),
            'day' => $this->faker->dayOfWeek,
            'open' => $this->faker->time,
            'close' => $this->faker->time,
            'is_close' => $this->faker->boolean,
        ];
    }
}
