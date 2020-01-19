<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        if (env('APP_DEBUG')) {
            $this->call(ApplicationSeeder::class);
        }
        $this->call(AdminSeeder::class);
    }
}
