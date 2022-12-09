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
            'avatar'    => '/assets/images/avatars/kareemdev.png',
            'name'      => "Kareem Tarek",
            'username'  => "KareemDEV",
            'email'     => 'admin@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'admin',
            'phone'     => '01010110457',
        ]);

        $user = User::create([ //ID = 2
            'name'      => "Maximus Franklin",
            'username'  => "M.Franklin",
            'email'     => 'moderator@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'moderator',
            'phone'     => '010000000001',
        ]);

        $user = User::create([ //ID = 3
            'name'      => "Raymond",
            'username'  => "Raymond",
            'email'     => 'supplier@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'supplier',
            'phone'     => '010000000002',
        ]);

        $user = User::create([ //ID = 4
            'avatar'    => '/assets/images/avatars/customer.jpg',
            'name'      => "Maria Madison",
            'username'  => "MaryMad",
            'email'     => 'customer@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'customer',
            'phone'     => '010000000003',
        ]);
    }
}
