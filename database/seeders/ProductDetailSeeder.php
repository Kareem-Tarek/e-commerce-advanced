<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductDetail;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product_detail = ProductDetail::create([
            'name'          => "Sweat-shirt",
            'price'         => 350,
            'description'   => "xxxxxxxxxxxxxx",
            'discount'      => 0.20,
            'brand_name'    => "polo",
            'sub_cat_id'    => 1,
            'supplier_id'   => 5,
        ]);

        $product_detail = ProductDetail::create([
            'name'          => "Long Dress",
            'price'         => 1000,
            'description'   => "xxxxxxxxxxxxxxx",
            'discount'      => 0.38,
            'brand_name'    => "H&M",
            'sub_cat_id'    => 5,
            'supplier_id'   => 4,
        ]);

        $product_detail = ProductDetail::create([
            'name'          => "dual-color jacket",
            'price'         => 700,
            'description'   => "2 Colors: black and navy blue",
            'discount'      => 0.05,
            'brand_name'    => "zara",
            'sub_cat_id'    => 1,
            'supplier_id'   => 6,
        ]);

        $product_detail = ProductDetail::create([
            'name'          => "Full suite",
            'price'         => 2000,
            'description'   => "2 Colors: brown and baby blue",
            'discount'      => 0.20,
            'brand_name'    => "zara",
            'sub_cat_id'    => 1,
            'supplier_id'   => 6,
        ]);

        $product_detail = ProductDetail::create([
            'name'          => "Black men hand-bag",
            'price'         => 500,
            'description'   => "xxxxxxxxxxxxx",
            'discount'      => 0.20,
            'brand_name'    => "zara",
            'sub_cat_id'    => 3,
            'supplier_id'   => 5,

        ]);
    }
}
