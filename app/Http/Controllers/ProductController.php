<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
// use App\Models\FinalProduct;

class ProductController extends Controller
{
    //------------------------------- for product details (single (ONE) product) -------------------------------//
    public function website_search(Request $request)
    {
        $website_search_input          = $request->website_search_query;
        $website_products_result       = ProductDetail::where('name','LIKE',"%{$website_search_input}%")
                                            ->orWhere('brand_name','LIKE',"%{$website_search_input}%")->get();
        $website_products_result_count = $website_products_result->count();

        return view('website.products.products_search.website_product_detail_search', compact('website_products_result' , 'website_search_input' , 'website_products_result_count'))
            ->with('i' , ($request->input('page', 1) - 1) * 5);
    }

    //------------------------------- for final products (multiple (MANY) products) -------------------------------//
    // public function website_search(Request $request)
    // {
    //     $website_search_input          = $request->website_search_query;
    //     $website_products_result       = FinalProduct::where('name','LIKE',"%{$website_search_input}%")
    //                                         ->orWhere('brand_name','LIKE',"%{$website_search_input}%")->get();
    //     $website_products_result_count = $website_products_result->count();

    //     return view('website.products.products_search.website_final_product_search', compact('website_products_result' , 'website_search_input' , 'website_products_result_count'))
    //         ->with('i' , ($request->input('page', 1) - 1) * 5);
    // }
}
