<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name'        =>   'SYMPHONY WITH LED LIGHT 54 INCH',
            'description' =>   'LIVING ROOM CEILING FANS',
            'price'       =>   '299.99',
            'type'        =>   'CEILING FANS'
        ]);

        DB::table('products')->insert([
            'name'        =>   'LOKI WITH LED LIGHT 36 INCH',
            'description' =>   'SMALL ROOM CEILING FANS',
            'price'       =>   '129.99',
            'type'        =>   'CEILING FANS'
        ]);

        DB::table('products')->insert([
            'name'        =>   'Luminous Buddy 230mm 55-Watt High Speed',
            'description' =>   'Exhaust Air Conditioner Blower Fan for Industrial Greenhouse Poultry Swine Farm',
            'price'       =>   '160',
            'type'        =>   'EXHAUST FANS'
        ]);
    }
}
