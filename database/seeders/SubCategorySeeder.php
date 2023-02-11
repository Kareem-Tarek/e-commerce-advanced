<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            'name'        => "Men's Casual wear",
            // 'description' => "",
            'cat_id'      => "1",   //ID (1) from categories table -> "men"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 2
            'name'        => "Watches",
            // 'description' => "",
            'cat_id'      => "1",   //ID (1) from categories table -> "men"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 3
            'name'        => 'Bags & Wallets',
            // 'description' => "",
            'cat_id'      => "1",   //ID (1) from categories table -> "men"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 4
            'name'        => "Underwear",
            // 'description' => "",
            'cat_id'      => "1",   //ID (1) from categories table -> "men"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 5
            'name'        => "Women's Fashion",
            // 'description' => "",
            'cat_id'      => "2",   //ID (2) from categories table -> "women"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 6
            'name'        => "Lingerie & Sleepwear",
            // 'description' => "",
            'cat_id'      => "2",   //ID (2) from categories table -> "women"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 7
            'name'        => 'Travel Bags & Backpacks',
            // 'description' => "",
            'cat_id'      => "2",   //ID (2) from categories table -> "women"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 8
            'name'        => "Jewelry",
            // 'description' => "",
            'cat_id'      => "2",   //ID (2) from categories table -> "women"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 9
            'name'        => "Kids' Fashion",
            // 'description' => "",
            'cat_id'      => "3",   //ID (3) from categories table -> "kids"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 10
            'name'        => "Toys",
            // 'description' => "",
            'cat_id'      => "3",   //ID (3) from categories table -> "kids"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 11
            'name'        => 'Baby Care',
            // 'description' => "",
            'cat_id'      => "3",   //ID (3) from categories table -> "kids"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

        $sub_category = SubCategory::create([ //ID = 12
            'name'        => "Nursing & Feeding",
            // 'description' => "",
            'cat_id'      => "3",   //ID (3) from categories table -> "kids"
            'created_at'  => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'  => null,
        ]);

    }
}
