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
            'USERNAME'    =>   'sonvt8',
            'PASSWORD'    =>   bcrypt('my_pass'),
            'NAME'        =>   'Vũ Thái Sơn',
            'EMAIL'       =>   'sonvt8@viettel.com.vn',
            'PHONE'       =>   '0977777606',
            'ADDRESS'     =>   'Hồ Chí Minh',
            'SEX'         =>   1,
            'DoR'         =>   '1988-05-15'
        ]);

        DB::table('users')->insert([
            'USERNAME'    =>   'babyShark',
            'PASSWORD'    =>    bcrypt('my_pass'),
            'NAME'        =>   'Tommy Vu',
            'EMAIL'       =>   'babyGangster@gmail.com',
            'PHONE'       =>   '0932527437',
            'ADDRESS'     =>   'America',
            'SEX'         =>   1,
            'DoR'         =>   '1996-01-22'
        ]);

        DB::table('users')->insert([
            'USERNAME'    =>   'shutDown',
            'PASSWORD'    =>   bcrypt('my_pass'),
            'NAME'        =>   'Nguyễn Xuân Bách',
            'EMAIL'       =>   'bachnx35@gmail.com',
            'PHONE'       =>   '0981978922',
            'ADDRESS'     =>   'Tiền Giang',
            'SEX'         =>   1,
            'DoR'         =>   '1989-04-30'
        ]);
    }
}
