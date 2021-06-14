<?php

use Illuminate\Database\Seeder;
use App\Units;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        $units = [
           'box',
           'Liter',
           '500ml',
           '150ml',
           'bottle',
           'Jar',
           'Tub',
           'kg'

        ];
   
        foreach ($units as $unitsLists) {
             Units::create(['unit_name' => $unitsLists]);
        }
    }
}
