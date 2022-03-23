<?php

namespace Database\Factories;

use App\Models\Paper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\question>
 */
class questionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence(),
            'op1' => $this->faker->word(),
            'op2' => $this->faker->word(),
            'op3' => $this->faker->word(),
            'op4' => $this->faker->word(),
            'true' => random_int(1,5),
            'paper_id' => random_int(1,count(Paper::all())),
        ];
    }
}
