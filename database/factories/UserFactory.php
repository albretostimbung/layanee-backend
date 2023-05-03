<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $province = Province::inRandomOrder()->first();
        $city = $province->cities()->inRandomOrder()->first();
        $district = $city->districts()->inRandomOrder()->first();
        $village = $district->villages()->inRandomOrder()->first();

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone_number' => "628" . fake()->numberBetween(1000000000, 9999999999),
            'whatsapp_number' => "628" . fake()->numberBetween(1000000000, 9999999999),
            'address' => fake()->address(),
            'province_code' => $province->code,
            'city_code' => $city->code,
            'district_code' => $district->code,
            'village_code' => $village->code,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
