<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TableFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name()
        ];
    }
}
