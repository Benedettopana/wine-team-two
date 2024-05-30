<?php

namespace Database\Seeders;

use App\Functions\Helper;
use App\Models\Flavor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class FlavorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $flavors = json_decode(file_get_contents(__DIR__ . '/aromi-vini.json'), false);

        foreach ($flavors->aromi  as $flavor) {

            $new_flavor = new Flavor();

            $new_flavor->name = $flavor;


            $new_flavor->slug = Helper::createSlug($new_flavor->name, Flavor::class);


            $new_flavor->save();
        }
    }
}
