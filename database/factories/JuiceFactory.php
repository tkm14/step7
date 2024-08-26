<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juice>
 */
class JuiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(10),
            'maker' => $this->faker->numberBetween($min = 1, $max = 3),
            'kakaku' => $this->faker->numberBetween($min = 50, $max = 999),
            'zaiko' => $this->faker->numberBetween($min = 1, $max = 999),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,

        ];
    }
}
