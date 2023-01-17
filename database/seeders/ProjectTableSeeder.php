<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $project = new Project;
            $project->name_project = $faker->words(3, true);
            $project->slug = Str::slug($project->name_project, '-');
            $project->description = $faker->paragraph();
            // $project->dev_lang = $faker->words(3, true);
            $project->framework = $faker->words(4, true);
            $project->team = $faker->firstName();
            $project->link_git = $faker->url();
            $project->lvl_diff = $faker->numberBetween(1,10);
            $project->save();
        }
    }
}
