<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'id' => '1',
            'name' => 'Administrador',
            'description' => 'Un administrador, puede hacer todo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role')->insert([
            'id' => '2',
            'name' => 'Encargado',
            'description' => 'Un encargado, puede autorizar préstamos pero no puede agregar usuarios.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role')->insert([
            'id' => '3',
            'name' => 'Usuario',
            'description' => 'Un usuario común, solo puede pedir prestado cosas.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
