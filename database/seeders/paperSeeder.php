<?php

namespace Database\Seeders;

use App\Models\Paper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paper::factory()->count(20)->create();
        //
    }
}
