<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkareasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workarea')->insert([
            'name' => 'Zona 1',
            'description' => 'Ejemplo de area',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
