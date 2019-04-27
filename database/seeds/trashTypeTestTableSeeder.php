<?php

use Illuminate\Database\Seeder;

class trashTypeTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trashType')->insert([
          'name' => 'Resíduo 1',
          'description' => 'Residuo 1',
          'created_at' => now(),
          'updated_at' => now()
        ]);
    }
}
