<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       \App\User::create([
            'name' => 'Can Ngoc Quan',
            'email' => 'quan@fuji-smt.com.sg',
            'email_verified_at' => now(),
            'password' => bcrypt('260190'),
            'group_id' => 1,
        ]);

        \App\User::create([
            'name' => 'Vu Khac Trung',
            'email' => 'quan@fuji-smt.com.sg',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'group_id' => 2,
        ]);
        \App\User::create([
            'name' => 'Nguyen Trong Dai',
            'email' => 'dai@fuji-smt.com.sg',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'group_id' => 2,
        ]);
        \App\Group::create([
            'name' => 'Admin',
        ]);
        \App\Group::create([
            'name' => 'User',
        ]);


        \App\Customer::create([
            'name' => 'CTL',
            'full_name' => 'Canon Thang Long Vietnam Co.,Ltd',
            'address' => 'KCN Thang Long, Dong Anh, Ha Noi',
            'tax' => '10',
            'mobile' => '024 33333333',
            'person' => 'Nguyen Tan Giang',
            'usd_rate' => '1.8',
            'jpy_rate' => '1.3',
            'normal_hrs' => '350000',
            'night_hrs' => '500000',
            'off_hrs' => '750000',
            'holiday_hrs' => '900000',
            'transport_price' => '1400000',
            'usd_vnd_rate' => '23000',
            'jpy_vnd_rate' => '25000',
        ]);


        \App\Head_type::create([
            'name' => 'H24',
            'price' => '23000000',
            'samsung_price' => '23000000',

        ]);
        \App\Head_type::create([
            'name' => 'H24S',
            'price' => '23000000',
            'samsung_price' => '23000000',

        ]);
        \App\Head_type::create([
            'name' => 'H24G',
            'price' => '23000000',
            'samsung_price' => '23000000',

        ]);
        \App\Head_type::create([
            'name' => 'V12',
            'price' => '21500000',
            'samsung_price' => '15500000',

        ]);



    }

}
