<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper as Help;
use App\Models\Wine;

class WineTableSeeder extends Seeder
{
    public function run(): void
    {
        $data_wine = file_get_contents('https://api.sampleapis.com/wines/reds');
        $data = json_decode($data_wine);

        foreach ($data as $item) {
            $new_wine = new Wine();
            $new_wine->winery = $item->winery;
            $new_wine->wine = $item->wine;
            $new_wine->slug = Help::createSlug($item->wine, Wine::class);
            $new_wine->rating_average = $item->rating->average;
            $new_wine->rating_reviews = $item->rating->reviews;
            $new_wine->location = $item->location;
            $new_wine->image = $item->image;
            $new_wine->save();
        }
    }

}
