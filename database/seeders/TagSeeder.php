<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Javascript', 'PHP', 'Python', 'HTML/CSS', 'Laravel', 'Vue'];
        $fa_tags = ['<i class="fa-brands fa-square-js"></i>', '<i class="fa-brands fa-php"></i>', '<i class="fa-brands fa-python"></i>', '<i class="fa-brands fa-html5"></i>/<i class="fa-brands fa-css3-alt"></i>', '<i class="fa-brands fa-laravel"></i>', '<i class="fa-brands fa-vuejs"></i>'];
        foreach ($tags as $key => $value) {
            $newtag = new Tag();
            $newtag->name = $value;
            $newtag->slug = Str::slug($newtag->name, '-');
            $newtag->fa_icon = $fa_tags[$key];
            $newtag->save();
        }
    }
}
