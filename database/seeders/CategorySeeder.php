<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Antiek en Kunst'],
            ['name' => 'Audio, Tv en Foto'],
            ['name' => 'Auto\'s'],
            ['name' => 'Auto-onderdelen'],
            ['name' => 'Auto diversen'],
            ['name' => 'Boeken'],
            ['name' => 'Caravans en Kamperen'],
            ['name' => 'Cd\'s en Dvd\'s'],
            ['name' => 'Computers en Software'],
            ['name' => 'Contacten en Berichten'],
            ['name' => 'Diensten en Vakmensen'],
            ['name' => 'Dieren en Toebehoren'],
            ['name' => 'Doe-het-zelf en Verbouw'],
            ['name' => 'Fietsen en Brommers'],
            ['name' => 'Hobby en Vrije tijd'],
            ['name' => 'Huis en Inrichting'],
            ['name' => 'Huizen en Kamers'],
            ['name' => 'Kinderen en Baby\'s'],
            ['name' => 'Kleding | Dames'],
            ['name' => 'Kleding | Heren'],
            ['name' => 'Motoren'],
            ['name' => 'Muziek en Instrumenten'],
            ['name' => 'Postzegels en Munten'],
            ['name' => 'Sieraden, Tassen en Uiterlijk'],
            ['name' => 'Spelcomputers en Games'],
            ['name' => 'Sport en Fitness'],
            ['name' => 'Telecommunicatie'],
            ['name' => 'Tickets en Kaartjes'],
            ['name' => 'Tuin en Terras'],
            ['name' => 'Vacatures'],
            ['name' => 'Vakantie'],
            ['name' => 'Verzamelen'],
            ['name' => 'Watersport en Boten'],
            ['name' => 'Witgoed en Apparatuur'],
            ['name' => 'Zakelijke goederen'],
            ['name' => 'Diversen'],
        ];

        DB::table('categories')->insert($categories);
    
    }
}
