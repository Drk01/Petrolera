<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        // $this->call(StorageTypeSeeder::class);
        $this->call(WorkareasTableSeeder::class);
        // $this->call(loanStatusTableSeeder::class);
        // $this->call(UnitsTableSeeder::class);
        // $this->call(trashTypeTestTableSeeder::class);
        // $this->call(trademarksTestTableSeeder::class);
        // $this->call(UsageTableSeeder::class);
        // $this->call(EnviromentTableSeeder::class);
        // $this->call(UbicationTableSeeder::class);
    }
}
