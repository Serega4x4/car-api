<?php

namespace Database\Factories;

use App\Models\Configuration;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigurationFactory extends Factory
{
    protected $model = Configuration::class;

    public function definition()
    {
        return [
            'car_id' => Car::factory(),
            'name' => $this->faker->word,
        ];
    }
}
