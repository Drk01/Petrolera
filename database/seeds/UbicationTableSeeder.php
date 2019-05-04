<?php

use Illuminate\Database\Seeder;

class UbicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubication')->insert([
          'name' => 'Ubication 1',
          'description' => 'Ubication 1',
          'created_at' => now(),
          'updated_at' => now()
        ]);
    }
}
