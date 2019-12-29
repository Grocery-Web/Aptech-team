<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'USERNAME'    =>   'superadmin',
            'PASSWORD'    =>   Hash::make('secret'),
            'ROLE_ID'     =>    1,
            'NAME'        =>   'Superadmin',
            'EMAIL'       =>   'superadmin@gmail.com',
            'PHONE'       =>   '0977777606',
            'ADDRESS'     =>   'Hồ Chí Minh',
            'SEX'         =>   'male',
            'AVATAR'      =>   'default.jpg'
        ]);

        DB::table('users')->insert([
            'USERNAME'    =>   'admin',
            'PASSWORD'    =>   Hash::make('secret'),
            'ROLE_ID'     =>    2,
            'NAME'        =>   'Admin',
            'EMAIL'       =>   'admin@gmail.com',
            'PHONE'       =>   '0912345678',
            'ADDRESS'     =>   'Japan',
            'SEX'         =>   'male'
        ]);

        DB::table('users')->insert([
            'USERNAME'    =>   'client',
            'PASSWORD'    =>   Hash::make('secret'),
            'NAME'        =>   'Client',
            'EMAIL'       =>   'client@gmail.com',
            'PHONE'       =>   '0981978973',
            'ADDRESS'     =>   'California',
            'SEX'         =>   'female'
        ]);
    }
}
