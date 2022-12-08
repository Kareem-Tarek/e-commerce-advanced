<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([ //ID = 1
            'name'      => "Kareem Tarek",
            'email'     => 'admin@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'admin',
        ]);

        $user = User::create([ //ID = 2
            'name'      => "Franklin_Moderator",
            'email'     => 'moderator@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'moderator',
        ]);

        $user = User::create([ //ID = 3
            'name'      => "Raymond",
            'email'     => 'supplier@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'supplier',
        ]);

        $user = User::create([ //ID = 4
            'name'      => "Maria_Madison",
            'email'     => 'customer@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'customer',
        ]);
    }
}
