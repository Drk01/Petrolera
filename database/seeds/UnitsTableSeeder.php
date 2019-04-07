<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'name' => 'Metros',
            'description' => '100 cm',
            'abbreviation' => 'm',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('units')->insert([
            'name' => 'Centímetros',
            'description' => '',
            'abbreviation' => 'cm',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('units')->insert([
            'name' => 'Pulgadas',
            'description' => '',
            'abbreviation' => 'inch',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('units')->insert([
            'name' => 'Milímetros',
            'description' => '',
            'abbreviation' => 'mm',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('units')->insert([
            'name' => 'Gramos',
            'description' => '',
            'abbreviation' => 'g',
            'updated_at' => now(),
            'created_at' => now()
        ]);
        DB::table('units')->insert([
            'name' => 'Kilogramos',
            'description' => '',
            'abbreviation' => 'kg',
            'updated_at' => now(),
            'created_at' => now()
        ]);
        DB::table('units')->insert([
            'name' => 'Litros',
            'description' => '',
            'abbreviation' => 'l',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('units')->insert([
            'name' => 'Mililitros',
            'description' => '',
            'abbreviation' => 'ml',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
