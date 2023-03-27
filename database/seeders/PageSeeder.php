<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'name' => 'home',
            'url' => '/',
            'order' => 1,
        ]);
        DB::table('pages')->insert([
            'name' => 'search',
            'url' => '/search',
            'order' => 2,
        ]);
        DB::table('pages')->insert([
            'name' => 'profile',
            'url' => '/profile',
            'order' => 3,
        ]);
    }
}
