<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'USERNAME'    =>   'superadmin',
            'PASSWORD'    =>    Hash::make('secret'),
            'NAME'        =>   'Vũ Thái Sơn',
            'EMAIL'       =>   'superadmin@gmail.com',
            'PHONE'       =>   '0977777606',
            'ADDRESS'     =>   'Hồ Chí Minh',
            'SEX'         =>   1,
            'IS_ADMIN'    =>   1,
            'LV_USER'     =>   2
        ]);

        DB::table('users')->insert([
            'USERNAME'    =>   'admin',
            'PASSWORD'    =>    Hash::make('secret'),
            'NAME'        =>   'Đặng Quang Trung Kiên',
            'EMAIL'       =>   'admin@gmail.com',
            'PHONE'       =>   '0933444555',
            'ADDRESS'     =>   'Hồ Chí Minh',
            'SEX'         =>   1,
            'IS_ADMIN'    =>   1,
            'LV_USER'     =>   1
        ]);

        DB::table('users')->insert([
            'USERNAME'    =>   'client',
            'PASSWORD'    =>    Hash::make('secret'),
            'NAME'        =>   'Lê Thanh Liêm',
            'EMAIL'       =>   'client@gmail.com',
            'PHONE'       =>   '0966777888',
            'ADDRESS'     =>   'Hồ Chí Minh',
            'SEX'         =>   1,
            'IS_ADMIN'    =>   0,
            'LV_USER'     =>   0
        ]);
    }
}
