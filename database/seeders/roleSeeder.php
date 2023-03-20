<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'id' => 0,
            'name' => 'User',
        ]);

        DB::table('role')->insert([
            'id' => 1,
            'name' => 'Admin',
        ]);
    }
}
