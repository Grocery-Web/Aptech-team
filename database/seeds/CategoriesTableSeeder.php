<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'      =>   'Table Fan',
        ]);

        DB::table('categories')->insert([
            'name'      =>   'Ceiling Fan',
        ]);

        DB::table('categories')->insert([
            'name'      =>   'Exhaust Fan',
        ]);

        DB::table('categories')->insert([
            'name'      =>   'High Class',
            'parent_id' =>   1
        ]);

        DB::table('categories')->insert([
            'name'      =>   'Basic',
            'parent_id' =>   1
        ]);

        DB::table('categories')->insert([
            'name'      =>   'Classic',
            'parent_id' =>   2
        ]);

        DB::table('categories')->insert([
            'name'      =>   'Economy',
            'parent_id' =>   3
        ]);
    }
}
