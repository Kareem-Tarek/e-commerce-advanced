<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\FinalProduct;

class DashboardFinalProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_for_each_product($id)
    {
        $find_product = ProductDetail::find($id);

        if(auth()->user()->user_type == 'supplier'){
            $final_products       = FinalProduct::where('supplier_id', auth()->user()->id)->where('product_id', $find_product->id)->orderBy('created_at','asc')->paginate(4);
            $final_products_count = $final_products->count();
        }
        else{
            $final_products       = FinalProduct::where('product_id', $find_product->id)->orderBy('created_at','asc')->paginate(4);
            $final_products_count = $final_products->count();
        }
        return view('dashboard.products.final_products.index', compact('final_products', 'final_products_count', 'find_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
