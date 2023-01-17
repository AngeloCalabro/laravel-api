<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = ['html', 'css', 'database', 'mysql', 'php', 'sass'];

        foreach ($languages as $language) {
            $newlanguage = new Language();
            $newlanguage->name = $language;
            $newlanguage->slug = Str::slug($newlanguage->name, '-');
            $newlanguage->save();
        }
    }
}
