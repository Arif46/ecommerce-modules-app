<?php

use Illuminate\Database\Seeders;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);

        /*DB::table('roles')->insert([
            'title' => 'Super Admin',
            'slug' => 'super-admin',
            'status' => 'active',
        ]);


        DB::table('users')->insert([
            'email' =>'admin@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 'active',
            'roles_id' => '1',
            'type' => 'admin'
        ]);*/
    }
}
