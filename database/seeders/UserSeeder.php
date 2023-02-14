<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'avatar'     => '/assets/images/avatars/kareemdev.png',
            'name'       => "Kareem Tarek",
            'username'   => "KareemDEV",
            'email'      => 'admin@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'admin',
            'phone'      => '01010110457', 
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,      
        ]);

        $user = User::create([ //ID = 2 (moderator)
            'name'       => "Maximus Franklin",
            'username'   => "M.Franklin",
            'email'      => 'moderator@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'moderator',
            'phone'      => '010000000001',
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,
        ]);

        $user = User::create([ //ID = 3 (customer)
            'avatar'     => '/assets/images/avatars/customer.jpg',
            'name'       => "Maria Madison",
            'username'   => "MaryMad",
            'email'      => 'customer@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'customer',
            'phone'      => '010000000002',
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,
        ]);

        $user = User::create([ //ID = 4 (supplier)
            'name'       => "Raymond",
            'username'   => "Raymond",
            'email'      => 'supplier@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'supplier',
            'phone'      => '010000000003',
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,
        ]);

        $user = User::create([ //ID = 5 (supplier)
            'name'       => "Fashionholic",
            'username'   => "Fashionholic",
            'email'      => 'supplier2@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'supplier',
            'phone'      => '010000000004',
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,
        ]);

        $user = User::create([ //ID = 6 (supplier)
            'name'       => "Aesthetics",
            'username'   => "Aesthetics",
            'email'      => 'supplier3@gmail.com',
            'password'   => bcrypt('123456789'),
            'user_type'  => 'supplier',
            'phone'      => '010000000005',
            'created_at' => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at' => null,
        ]);
    }
}
