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
            'PASSWORD'    =>    Hash::make('secret'),
            'NAME'        =>   'Vũ Thái Sơn',
            'EMAIL'       =>   'sonvt8@viettel.com.vn',
            'PHONE'       =>   '0977777606',
            'ADDRESS'     =>   'Hồ Chí Minh',
            'SEX'         =>   1
        ]);
    }
}
