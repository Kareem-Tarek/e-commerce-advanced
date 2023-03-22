<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\FinalProduct;

class FinalProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //---------------------------------------- Start of product_id (1) ----------------------------------------//
        $final_product = FinalProduct::create([
            'name'               => 'Sweat-shirt',
            'brand_name'         => 'Fashionholic',
            'size'               => "XL",
            'color'              => "grey",
            'available_quantity' => 7,
            'image'              => '/assets/images/product-images/product-image36.jpg',
            'product_id'         => 1,
            'supplier_id'        => 5,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Sweat-shirt',
            'brand_name'         => 'Fashionholic',
            'size'               => "3XL",
            'color'              => "yellow",
            'available_quantity' => 9,
            'image'              => '/assets/images/',
            'product_id'         => 1,
            'supplier_id'        => 5,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Full suite',
            'brand_name'         => 'Fashionholic',
            'size'               => "L",
            'color'              => "crimson",
            'available_quantity' => 5,
            'image'              => '/assets/images/',
            'product_id'         => 4,
            'supplier_id'        => 5,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Sweat-shirt',
            'brand_name'         => 'Fashionholic',
            'size'               => "M",
            'color'              => "indigo",
            'available_quantity' => 10,
            'image'              => '/assets/images/',
            'product_id'         => 1,
            'supplier_id'        => 5,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Sweat-shirt',
            'brand_name'         => 'Fashionholic',
            'size'               => "XL",
            'color'              => "orange",
            'available_quantity' => 5,
            'image'              => '/assets/images/product-images/product-image36.jpg',
            'product_id'         => 1,
            'supplier_id'        => 5,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Long Dress',
            'brand_name'         => 'Fashionholic',
            'size'               => "4XL",
            'color'              => "darkcyan",
            'available_quantity' => 5,
            'image'              => '/assets/images/',
            'product_id'         => 2,
            'supplier_id'        => 5,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Sweat-shirt',
            'brand_name'         => 'Fashionholic',
            'size'               => "L",
            'color'              => "hotpink",
            'available_quantity' => 5,
            'image'              => '/assets/images/',
            'product_id'         => 1,
            'supplier_id'        => 5,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Sweat-shirt',
            'brand_name'         => 'Fashionholic',
            'size'               => "M",
            'color'              => "olive",
            'available_quantity' => 12,
            'image'              => '/assets/images/',
            'product_id'         => 1,
            'supplier_id'        => 5,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);
        //---------------------------------------- End of product_id (1) ----------------------------------------//


        //---------------------------------------- Start of product_id (2) ----------------------------------------//
        $final_product = FinalProduct::create([
            'name'               => 'Long Dress',
            'brand_name'         => 'BUDDHA',
            'size'               => "M",
            'color'              => "red",
            'available_quantity' => 8,
            'image'              => '/assets/images/product-detail-page/product-with-right-thumbs-1.jpg',
            'product_id'         => 2,
            'supplier_id'        => 4,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Long Dress',
            'brand_name'         => 'BUDDHA',
            'size'               => "L",
            'color'              => "gold",
            'available_quantity' => 6,
            'image'              => '/assets/images/product-detail-page/product-with-right-thumbs-2.jpg',
            'product_id'         => 2,
            'supplier_id'        => 4,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Long Dress',
            'brand_name'         => 'BUDDHA',
            'size'               => "XL",
            'color'              => "white",
            'available_quantity' => 5,
            'image'              => '/assets/images/product-detail-page/product-with-right-thumbs-3.jpg',
            'product_id'         => 2,
            'supplier_id'        => 4,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        $final_product = FinalProduct::create([
            'name'               => 'Long Dress',
            'brand_name'         => 'BUDDHA',
            'size'               => "2XL",
            'color'              => "green",
            'available_quantity' => 3,
            'image'              => '/assets/images/product-detail-page/product-with-right-thumbs-3.jpg',
            'product_id'         => 2,
            'supplier_id'        => 4,
            'created_at'         => Carbon::now()->toDateTimeString(), // Also Carbon::now()->toDateTimeString() OR Carbon::now OR now()
            'updated_at'         => null,
        ]);

        //---------------------------------------- End of product_id (2) ----------------------------------------//

    }
}
