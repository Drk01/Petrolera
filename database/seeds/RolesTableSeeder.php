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
            'name' => 'Admin',
            'description' => 'An admin, it can do everything',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('role')->insert([
            'id' => '2',
            'name' => 'User',
            'description' => 'A basic user, it can do nothing',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
