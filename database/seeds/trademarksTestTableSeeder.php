<?php

use Illuminate\Database\Seeder;

class trademarksTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trademarks')->insert([
          'name' => 'Marca 1',
          'description' => 'Marca 1',
          'created_at' => noW(),
          'updated_at' => now()
        ]);
    }
}
