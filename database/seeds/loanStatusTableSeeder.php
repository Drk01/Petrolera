<?php

use Illuminate\Database\Seeder;

class loanStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loan_statuses')->insert([
            'id' => '1',
            'name' => 'Devuelto',
            'description' => 'El artículo ya fue retornado al almacén.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('loan_statuses')->insert([
            'id' => '2',
            'name' => 'Pendiente',
            'description' => 'El artículo todavía sigue en préstamo.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
