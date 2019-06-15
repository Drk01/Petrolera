<?php

use Illuminate\Database\Seeder;

class UsageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usages')->insert([
          'name' => 'Uso 1',
          'description' => 'Uso 1',
          'created_at' => now(),
          'updated_at' => now()
        ]);
    }
}
