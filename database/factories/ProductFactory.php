<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 5, $max = 100),
            'description' => $this->faker->sentence(),
            'visibilité' => $this->faker->randomElement($array = array ('publié','non publié')),
            'etat' => $this->faker->randomElement($array = array ('standard','sold')),
            'reference' => $this->faker->regexify('[A-Z0-9]+[A-Z0-9]+\.[A-Z]{2,4}')
        ];
    }
}

