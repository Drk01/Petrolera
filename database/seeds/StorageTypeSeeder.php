<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type')->insert([
            'id' => '1',
            'name' => 'Especial',
            'description' => 'Materiales que requieren cierto tipo de cuidado para manipularlos.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('type')->insert([
            'id' => '2',
            'name' => 'Peligroso',
            'description' => 'Materiales que requieren un manejo especial debido a su nivel de peligrosidad',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
