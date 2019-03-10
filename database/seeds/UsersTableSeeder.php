<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'admin',
            'lastname' => 'admin',
            'motherLastname' => 'admin',
            'user'=> 'admin',
            'email' => 'admin',
            'password' => bcrypt('admin'),
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users_roles')->insert([
            'id' => '1',
            'roles_id' => '1',
            'users_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
