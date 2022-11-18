<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>s
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(['MacBook Pro', 'MacbookAir']),
            'manufacturer' => fake()->randomElement(['apple']),
            'serial_no' => fake()->randomElement(['1112oeb5r4', '33gkfff6553']),
            'category' => fake()->randomElement(['Laptop']),
            'eol' => fake()->randomElement(['22 months', '36 months']),
            'location' => fake()->randomElement(['North Campus', 'South Campus', 'East Campus']),
        ];
    }
}
