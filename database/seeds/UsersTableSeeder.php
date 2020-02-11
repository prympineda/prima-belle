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
            'uid' => \Str::uuid(),
            'role_id' => 1,
            'name' => "Prym",
            'email' => 'prym@prima-belle.com',
            'password' => bcrypt('password')
        ]);
        DB::table('users')->insert([
            'uid' => \Str::uuid(),
            'name' => "Khaliza",
            'email' => 'khaliza@prima-belle.com',
            'password' => bcrypt('password')
        ]);
    }
}
