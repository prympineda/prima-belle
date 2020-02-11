<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'uid' => \Str::uuid(),
            'name' => "administrator"
        ]);
        DB::table('roles')->insert([
            'uid' => \Str::uuid(),
            'name' => "user"
        ]);

    }
}
