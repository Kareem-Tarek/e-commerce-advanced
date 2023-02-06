<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([ //ID = 1
            'name'        => 'men',
            // 'description' => "",
        ]);

        $category = Category::create([ //ID = 2
            'name'        => "women",
            // 'description' => "",
        ]);

        $category = Category::create([ //ID = 3
            'name'        => "kids",
            // 'description' => "",
        ]);

    }
}
