<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'lv_user'     =>   'Superadmin'
        ]);

        DB::table('roles')->insert([
            'lv_user'     =>   'Admin'
        ]);

        DB::table('roles')->insert([
            'lv_user'     =>   'Client'
        ]);
    }
}
