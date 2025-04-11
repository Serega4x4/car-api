<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Configuration;

class ConfigurationSeeder extends Seeder
{
    public function run()
    {
        Configuration::factory(10)->create();
    }
}
