<?php

namespace Database\Seeders;

use App\Models\Flavor;
use App\Models\Wine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class FlavorWineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 1000; $i++) {
            $wine =Wine::inRandomOrder()->first();

            $flavor_id = Flavor::inRandomOrder()->first()->id;

            $wine->flavors()->attach( $flavor_id);
        }
    }
}
