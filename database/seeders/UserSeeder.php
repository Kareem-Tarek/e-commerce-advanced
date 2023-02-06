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
        $user = User::create([ //ID = 1 (admin)
            'avatar'    => '/assets/images/avatars/kareemdev.png',
            'name'      => "Kareem Tarek",
            'username'  => "KareemDEV",
            'email'     => 'admin@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'admin',
            'phone'     => '01010110457',
        ]);

        $user = User::create([ //ID = 2 (moderator)
            'name'      => "Maximus Franklin",
            'username'  => "M.Franklin",
            'email'     => 'moderator@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'moderator',
            'phone'     => '010000000001',
        ]);

        $user = User::create([ //ID = 3 (customer)
            'avatar'    => '/assets/images/avatars/customer.jpg',
            'name'      => "Maria Madison",
            'username'  => "MaryMad",
            'email'     => 'customer@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'customer',
            'phone'     => '010000000002',
        ]);

        $user = User::create([ //ID = 4 (supplier)
            'name'      => "Raymond",
            'username'  => "Raymond",
            'email'     => 'supplier@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'supplier',
            'phone'     => '010000000003',
        ]);

        $user = User::create([ //ID = 5 (supplier)
            'name'      => "Fashionholic",
            'username'  => "Fashionholic",
            'email'     => 'supplier2@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'supplier',
            'phone'     => '010000000004',
        ]);

        $user = User::create([ //ID = 6 (supplier)
            'name'      => "Aesthetics",
            'username'  => "Aesthetics",
            'email'     => 'supplier3@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is hashed): 123456789
            'user_type' => 'supplier',
            'phone'     => '010000000005',
        ]);
    }
}
