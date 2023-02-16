<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\FinalProduct;
use App\Models\SubCategory;

class DashboardProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // public function index()
    // {
    //     //
    // }

    public function index(/*$id*/){   //index_general_for_products
        // $product_detail = ProductDetail::findOrFail($id);

        if(auth()->user()->user_type == 'supplier'){
            //for the current functionality -> show the product details data (the general products page for suppliers)//
            $products_details       = ProductDetail::where('supplier_id', auth()->user()->id)->orderBy('created_at','asc')->paginate(30);
            $products_details_count = $products_details->count();

            // only for counting the final products number (for suppliers)//
            // $final_products       = FinalProduct::where('supplier_id', auth()->user()->id)->where('product_id', $product_detail->id)->orderBy('created_at','asc')->paginate(7);
            // $final_products_count = $final_products->count();
        }
        else{
            //for the current functionality -> show the product details data (the general products page for admins & moderators)//
            $products_details       = ProductDetail::orderBy('created_at','asc')->paginate(30);
            $products_details_count = $products_details->count();

            //only for counting the final products number (for admins & moderators)//
            // $final_products       = FinalProduct::where('product_id', $product_detail->id)->orderBy('created_at','asc')->paginate(7);
            // $final_products_count = $final_products->count();
        }

        return view('dashboard.products.products_details.index', compact('products_details', 'products_details_count'/*, 'final_products_count'*/));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_category = SubCategory::all();
        return view('dashboard.products.products_details.create', compact('sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_details              = new ProductDetail;
        $product_details->name        = $request->name;
        $product_details->description = $request->description;
        $product_details->discount    = $request->discount;
        $product_details->price       = $request->price;
        $product_details->sub_cat_id  = $request->sub_cat_id;
        $product_details->brand_name  = $request->brand_name;

        // if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || (auth()->user()->user_type == "supplier" && $request->supplier_id == auth()->user()->id)){
        //     $product_details->supplier_id = $request->supplier_id;
        // }
        // elseif(auth()->user()->user_type == "supplier" && $request->supplier_id != auth()->user()->id){
        //     return redirect()->back()->with(['auth_user_supplier_not_matching_id' => "Your data is not matching the (Supplier *) field!"]);
        // }

        if(auth()->user()->user_type == "supplier"){
            if($request->supplier_id == auth()->user()->id){
                $product_details->supplier_id = $request->supplier_id;
            }
            else/*if($request->supplier_id != auth()->user()->id)*/{
                return redirect()->back()->with(['auth_user_supplier_not_matching_id' => "Your data is not matching the (Supplier *) field!"]);
            }
        }
        else{
            $product_details->supplier_id = $request->supplier_id;
        }
        // $product_details->supplier_id    = $request->supplier_id;
        $product_details->create_user_id = auth()->user()->id;
        $product_details->save();

        return redirect()->route('all-products.index')
            ->with(['added_products_details_message' => "($product_details->name) - Added successfully!"]);
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
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "supplier"){
            $ProductDetail_model = ProductDetail::findOrFail($id);
            $sub_category        = SubCategory::all();
            return view('dashboard.products.products_details.edit', compact('ProductDetail_model', 'sub_category'));
        }
        elseif(auth()->user()->user_type == "moderator"){
            return redirect()->route('all-products.index');
        }
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
        $product_details_old          = ProductDetail::findOrFail($id);

        $product_details              = ProductDetail::findOrFail($id);
        $product_details->name        = $request->name;
        $product_details->description = $request->description;
        $product_details->discount    = $request->discount;
        $product_details->price       = $request->price;
        $product_details->sub_cat_id  = $request->sub_cat_id;
        $product_details->brand_name  = $request->brand_name;
        if(auth()->user()->user_type == "supplier"){
            if($request->supplier_id == auth()->user()->id){
                $product_details->supplier_id = $request->supplier_id;
            }
            else/*if($request->supplier_id != auth()->user()->id)*/{
                return redirect()->back()->with(['auth_user_supplier_not_matching_id' => "Your data is not matching the (Supplier *) field! Please try again."]);
            }
        }
        else{
            $product_details->supplier_id = $request->supplier_id;
        }
        // $product_details->supplier_id    = $request->supplier_id;
        $product_details->update_user_id = auth()->user()->id;
        $product_details->save();

        return redirect()->route('all-products.index')
            ->with(['updated_products_details_message' => "The product detail ($product_details_old->name) has been changed to ($product_details->name) successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_detail = ProductDetail::find($id);
        $final_products = FinalProduct::where('product_id', $product_detail->id)->get();
        foreach($final_products as $final_product){
            $final_product->delete();
        }
        $product_detail->delete();

        return redirect()->route('all-products.index')
            ->with(['deleted_product_detail_message' => "($product_detail->name) - Deleted successfully from the products main page"]);
    }

    public function delete()
    {
        if(auth()->user()->user_type == 'supplier'){
            $products_details       = ProductDetail::where('supplier_id', auth()->user()->id)->orderBy('created_at','asc')->onlyTrashed()->paginate(5);
            $products_details_count = $products_details->count();
        }
        else{
            $products_details       = ProductDetail::orderBy('created_at','asc')->onlyTrashed()->paginate(5);
            $products_details_count = $products_details->count();
        }
        
        return view('dashboard.products.products_details.delete',compact('products_details', 'products_details_count'));
    }

    public function restore($id)
    {
        ProductDetail::withTrashed()->find($id)->restore();
        $product_details = ProductDetail::findOrFail($id);
        $final_products  = FinalProduct::withTrashed()->get();
        foreach($final_products as $final_product){
            $final_product->restore();
        }
        return redirect()->route('all-products.delete')
            ->with(['restored_product_detail_message' => "($product_details->name) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        ProductDetail::where('id', $id)->forceDelete();
        return redirect()->route('all-products.delete')
            ->with(['permanent_deleted_product_detail_message' => "Permanently deleted successfully!"]);
    }
}
