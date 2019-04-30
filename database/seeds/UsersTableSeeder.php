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
        $user  = App\User::create([

            'name' => 'saikat',
            'email' => 'me@email.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/1.png',
            'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem ',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
