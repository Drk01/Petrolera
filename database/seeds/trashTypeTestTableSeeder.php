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
        DB::table('trash_types')->insert([
          'name' => 'Resíduo 1',
          'description' => 'Residuo 1',
          'created_at' => now(),
          'updated_at' => now()
        ]);
    }
}
