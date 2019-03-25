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
            'id' => '1',
            'name' => 'Zona 1',
            'description' => 'Ejemplo de area',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('user_workarea')->insert([
            'id' => 1,
            'user_id' => 1,
            'workarea_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
