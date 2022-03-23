<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Contracts\Auth\Authenticatable;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Illuminate\Contracts\Auth\Authenticatable>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

//            'name' => $this->faker->name(),
//            'email' => $this->faker->unique()->safeEmail(),
//            'username' => $this->faker->unique(),
//            'dob' => $this->faker->dateTime(),



            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->userName(),
            'dob' => '1997-10-12',
            'password' => 'password', // password
            'status' => 'active',
        ];
    }
}
