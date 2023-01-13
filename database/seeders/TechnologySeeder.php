<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['API', 'mySQL DB', 'NoSQL', 'static website', 'web app', 'dynamic website'];
        foreach ($technologies as $technology) {
            $newtech = new Technology();
            $newtech->name = $technology;
            $newtech->slug = Str::slug($newtech->name);
            $newtech->save();
        }
    }
}
