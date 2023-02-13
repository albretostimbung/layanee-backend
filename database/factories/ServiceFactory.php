<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\ServiceCategory;
use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(2),
            'service_category_id' => ServiceCategory::factory(),
            'user_id' => User::factory(),
            'description' => fake()->paragraph(1),
            'province_code' => $provinceCode = Province::inRandomOrder()->first()->code,
            'city_code' => $cityCode = City::inRandomOrder()->where('province_code', $provinceCode)->first()->code,
            'district_code' => $districtCode = District::inRandomOrder()->where('city_code', $cityCode)->first()->code,
            'village_code' => Village::inRandomOrder()->where('district_code', $districtCode)->first()->code,
            'address' => fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'is_active' => fake()->boolean(),
        ];
    }
}
