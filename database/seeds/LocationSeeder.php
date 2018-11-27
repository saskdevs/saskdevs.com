<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::firstOrCreate([
            'name' => 'Saskatoon',
        ]);

        Location::firstOrCreate([
            'name' => 'Regina',
        ]);

        Location::firstOrCreate([
            'name' => 'Prince Albert',
        ]);
    }
}
