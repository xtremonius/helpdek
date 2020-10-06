<?php

use Illuminate\Database\Seeder;
use App\User;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Support 1 - Projecto 1
        User::create([ //3
            'name' => 'Dante Aquino',
            'email' => 'danteryu@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 1
         ]);

         User::create([ //4
            'name' => 'Soporte S1',
            'email' => 'support1@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 1
         ]);
    }
}
