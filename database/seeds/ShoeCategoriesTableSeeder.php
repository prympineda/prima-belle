<?php

use Illuminate\Database\Seeder;

class ShoeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoe_categories')->insert([
            'uid' => \Str::uuid(),
            'name' => "Two Inches Heels"
        ]);
        DB::table('shoe_categories')->insert([
            'uid' => \Str::uuid(),
            'name' => "Half Inch Heels"
        ]);
        DB::table('shoe_categories')->insert([
            'uid' => \Str::uuid(),
            'name' => "Doll Shoes"
        ]);
        DB::table('shoe_categories')->insert([
            'uid' => \Str::uuid(),
            'name' => "Mules"
        ]);
        DB::table('shoe_categories')->insert([
            'uid' => \Str::uuid(),
            'name' => "Birks"
        ]);
        DB::table('shoe_categories')->insert([
            'uid' => \Str::uuid(),
            'name' => "Sewn Sole Doll Shoes"
        ]);
    }
}
