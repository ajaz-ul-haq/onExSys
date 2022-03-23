<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class studentFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'dob' => '1997-10-12',
            'password' => 'password',
            'class' => random_int(3, 12).'th',
            'phone' => random_int(7000000000, 9999999999),
            'rollno' => random_int(100, 999),
            'status' => 'active',
        ];
    }
}
