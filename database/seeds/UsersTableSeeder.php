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
        \App\User::create([
            'name'      => 'Shweta Bansal',
            'email'     => 'ershwetabansal@gmail.com',
            'password'  => bcrypt('password'),
            'is_admin'  => true
        ]);

        \App\User::create([
            'name'      => 'Shivani Maurya',
            'email'     => 'shivani.maurya@gmail.com',
            'password'  => bcrypt('password'),
            'is_admin'  => true,
        ]);
    }
}
