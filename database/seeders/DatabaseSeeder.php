<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('role')->insert([
            'id' => 0,
            'name' => 'User',
        ]);

        DB::table('role')->insert([
            'id' => 1,
            'name' => 'Admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@time2share.nl',
            'password' => Hash::make('admin'),
            'role' => '1',
            'status' => '1',
        ]);

        $this->call(CategorySeeder::class);
    }
}
