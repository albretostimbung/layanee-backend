<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\City;
use App\Models\Village;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->reset();

        $this->call(ProvincesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(VillagesSeeder::class);

        \App\Models\Service::factory(3)->hasOpeningHours(5)->hasPaymentMethods(5)->create();
    }

    public function reset()
    {
        Schema::disableForeignKeyConstraints();

        Village::truncate();
        District::truncate();
        City::truncate();
        Province::truncate();

        Schema::disableForeignKeyConstraints();
    }
}
