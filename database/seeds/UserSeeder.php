<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   // Admin
        User::create([
            'name' => 'Alejandro Aquino',
            'email' => 'xtremonius@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 0
        ]);
         // Support
         User::create([
            'name' => 'Dante Aquino',
            'email' => 'danteryu@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 1
        ]);
         // Client
         User::create([
            'name' => 'Analia Prado',
            'email' => 'analia.prado1984@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 2
        ]);
    }
}
