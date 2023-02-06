<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;

class DashboardProductDetailController extends Controller
{
    public function index(){
        if(auth()->user()->user_type == 'supplier'){
            $products_details       = ProductDetail::where('supplier_id', auth()->user()->id)->orderBy('created_at','asc')->paginate(30);
            $products_details_count = $products_details->count();
        }
        else{
            $products_details       = ProductDetail::orderBy('created_at','asc')->paginate(30);
            $products_details_count = $products_details->count();
        }
        return view('dashboard.products.products_details.index', compact('products_details', 'products_details_count'));
    }
}
