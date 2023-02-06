<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_category = SubCategory::create([ //ID = 1
            'name'        => 'Boys Winter Collection',
            // 'description' => "",
            'cat_id'      => "1",   //ID (1) from categories table -> "men"
        ]);

        $sub_category = SubCategory::create([ //ID = 2
            'name'        => "Boys' Coat",
            // 'description' => "",
            'cat_id'      => "1",   //ID (1) from categories table -> "men"
        ]);


        $sub_category = SubCategory::create([ //ID = 3
            'name'        => 'Girls Winter Collection',
            // 'description' => "",
            'cat_id'      => "2",   //ID (2) from categories table -> "women"
        ]);

        $sub_category = SubCategory::create([ //ID = 4
            'name'        => "Girls' Coat",
            // 'description' => "",
            'cat_id'      => "2",   //ID (2) from categories table -> "women"
        ]);

        $sub_category = SubCategory::create([ //ID = 5
            'name'        => 'Kids Winter Collection',
            // 'description' => "",
            'cat_id'      => "3",   //ID (3) from categories table -> "kids"
        ]);

        $sub_category = SubCategory::create([ //ID = 6
            'name'        => "Kids' Coat",
            // 'description' => "",
            'cat_id'      => "3",   //ID (3) from categories table -> "kids"
        ]);

    }
}
