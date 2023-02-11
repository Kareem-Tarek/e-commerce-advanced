<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $category = Category::create([ //ID = 2
            'name'        => "women",
            // 'description' => "",
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $category = Category::create([ //ID = 3
            'name'        => "kids",
            // 'description' => "",
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

    }
}
