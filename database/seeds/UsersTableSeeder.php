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
            'name' => 'liku2110',
            'email' => 'kute2110@gmail.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
