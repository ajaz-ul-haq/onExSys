<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\paper>
 */
class paperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subjects = ['Poltical Science','Hindi','English','Mathematics','Urdu','Science','History','Geography','Physics','Chemistry','Biology','Statistics'];
        $time = [30, 40, 50,60,45,90,120];

        return [
            'class' => random_int(3, 12).'th',
            'subject' => $subjects[random_int(0, 11)],
            'creator' => 'dbSeeder',
            'time'=> $time[random_int(0, 6)],
        ];
    }

}
