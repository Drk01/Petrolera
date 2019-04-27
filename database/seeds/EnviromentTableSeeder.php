<?php

use Illuminate\Database\Seeder;

class EnviromentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enviroment')->insert([
          'name' => 'Enviroment 1',
          'description' => 'Enviroment 1',
          'created_at' => now(),
          'updated_at' => now()
        ]);
    }
}
