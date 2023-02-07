<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory=Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => random_int(1, 3),
            'entity_id' => random_int(124555, 789995),
            'image' => $this->faker->imageUrl(20),
            'name' => $this->faker->text,
            'price' => random_int(50, 250),
        ];
    }
}
