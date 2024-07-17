<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Project::create([
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),  
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),  
                'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'status' => $faker->randomElement(['active', 'completed', 'pending']),
                'type_id' => $faker->numberBetween(1, 4),
                // 'git_url' => 'URL',
                'img_url' => 'URL'
            ]);
        }
    }
}

