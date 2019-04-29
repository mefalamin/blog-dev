<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *php artisan make:seeder UsersTableSeeder command for generate this class for bootstrap the database

     * @return void
     */
    public function run()
    {
             App\User::create([

                 'name' => 'saikat',
                 'email' => 'saikat@email.com',
                 'password' => bcrypt('password')
             ]);
    }
}
