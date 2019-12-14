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
            'type'        =>   'CEILING FANS',
            'image'       =>    'SYMPHONY WITH LED LIGHT 54 INCH.jpg'
        ]);

        DB::table('products')->insert([
            'name'        =>   'LOKI WITH LED LIGHT 36 INCH',
            'description' =>   'SMALL ROOM CEILING FANS',
            'price'       =>   '129.99',
            'type'        =>   'CEILING FANS',
            'image'       =>    'LOKI WITH LED LIGHT 36 INCH.jpg'
        ]);

        DB::table('products')->insert([
            'name'        =>   'Luminous Buddy 230mm 55-Watt High Speed',
            'description' =>   'Exhaust Air Conditioner Blower Fan for Industrial Greenhouse Poultry Swine Farm',
            'price'       =>   '160',
            'type'        =>   'EXHAUST FANS',
            'image'       =>   'Luminous Buddy 230mm 55-Watt High Speed.jpg'
        ]);
        DB::table('products')->insert([
            'name'        =>   'Home Table Fans with Blue',
            'description' =>   'As per the needs and requirements of our clients, we are involved in providing Home Table Fans.',
            'price'       =>   '300',
            'type'        =>   'TABLE FANS',
            'image'       =>   '71vRtKjrHXL._SY679_.jpg'
        ]);
        DB::table('products')->insert([
            'name'        =>   'Metro High Speed Fans',
            'description' =>   'Metro brand is owned by M/s Samarth Impex which is a manufacturing and export based company from Hyderabad INDIA.',
            'price'       =>   '320',
            'type'        =>   'CEILING FANS',
            'image'       =>   '24-inches-fans-500x500.jpg'
        ]);
        DB::table('products')->insert([
            'name'        =>   'Metro High Speed Fans',
            'description' =>   'Metro brand is owned by M/s Samarth Impex which is a manufacturing and export based company from Hyderabad INDIA.',
            'price'       =>   '320',
            'type'        =>   'CEILING FANS',
            'image'       =>   '24-inches-fans-500x500.jpg'
        ]);
    }
}
