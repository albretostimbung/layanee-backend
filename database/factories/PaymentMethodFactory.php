<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentMethod>
 */
class PaymentMethodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'service_id' => Service::inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl,
            'is_active' => $this->faker->boolean,
        ];
    }
}
