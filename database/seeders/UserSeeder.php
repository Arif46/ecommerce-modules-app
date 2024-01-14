<?php

namespace Database\Seeders;

use App\AppConfig;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'superadmin@example.com',
            //'password' => Hash::make(123456),
            'password' => bcrypt('123456'),
            'username' => 'Super Admin',
            'mobile_no' => '11111111',
            'roles_id' => AppConfig::USER_ROLE_SUPER_ADMIN,
            'type' => AppConfig::USER_ROLE_TYPE_SUPER_ADMIN,
            'status' => 'active',
        ]);
//        DB::table('users')->insert([
//
//        ]);
    }
}
