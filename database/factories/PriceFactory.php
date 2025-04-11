<?php

namespace Database\Factories;

use App\Models\Price;
use App\Models\Configuration;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    protected $model = Price::class;

    public function definition()
    {
        return [
            'configuration_id' => Configuration::factory(),
            'price' => $this->faker->numberBetween(20000, 50000),
            'start_date' => $this->faker->dateTimeThisYear,
            'end_date' => $this->faker->dateTimeThisYear,
        ];
    }
}
