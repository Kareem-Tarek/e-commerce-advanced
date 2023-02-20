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
        $product_detail = ProductDetail::find($id);
        if($product_detail == null){
            return view('errors.template-customized-error.dashboard.404');
        }
        else{
            if(auth()->user()->user_type == 'supplier'){
                $final_products       = FinalProduct::where('supplier_id', auth()->user()->id)->where('product_id', $product_detail->id)->orderBy('created_at','asc')->paginate(7);
                $final_products_count = $final_products->count();
            }
            else{
                $final_products       = FinalProduct::where('product_id', $product_detail->id)->orderBy('created_at','asc')->paginate(7);
                $final_products_count = $final_products->count();
            }
            return view('dashboard.products.final_products.index', compact('final_products', 'final_products_count', 'product_detail'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_details = ProductDetail::all();
        return view('dashboard.products.final_products.create', compact('product_details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $final_product                     = new FinalProduct;
        $final_product->size               = $request->size;
        $final_product->color              = $request->color;
        $final_product->available_quantity = $request->available_quantity;
        if($request->image == null || $request->image == ""){
            $final_product->image = null;
        }
        else{
            $final_product->image = '/assets/images/products/'.$request->image;
        }
        $final_product->product_id         = $request->product_id;
        if(auth()->user()->user_type == "supplier"){
            $final_product->supplier_id = auth()->user()->id;
        }
        else{
            $final_product->supplier_id = $request->supplier_id;
        }
        $final_product->save();

        // return redirect()->route('final_products.index')
        return redirect()->route('all-products.index')
            ->with(['added_final_products_message' => "Product [ID: $final_product->id] Added successfully!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
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
            $FinalProduct_model = FinalProduct::find($id);
            if($FinalProduct_model != null){
                $product_details = ProductDetail::all();
                return view('dashboard.products.final_products.edit', compact('FinalProduct_model', 'product_details'));
            }
            else{
                return view('errors.template-customized-error.dashboard.404');
            }
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
        $final_product_old = FinalProduct::find($id);

        $final_product     = FinalProduct::find($id);
        if($final_product == null){
            return view('errors.template-customized-error.dashboard.404');
        }
        else{
            $final_product->size               = $request->size;
            $final_product->color              = $request->color;
            $final_product->available_quantity = $request->available_quantity;
            if($request->image == null || $request->image == ""){
                $final_product->image = $final_product_old->image;
            }
            else{
                $final_product->image = '/assets/images/products/'.$request->image;
            }
            if(auth()->user()->user_type == "supplier"){
                $final_product->supplier_id = auth()->user()->id;
                // $final_product->update_user_id = $request->color;
            }
            else{
                $final_product->supplier_id = $request->supplier_id;
            }
            $final_product->save();
    
            return redirect()->route('all-products.index')
                ->with(['updated_final_products_message' => "Product [ID: $final_product->id] Added successfully!"]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $final_products = FinalProduct::findOrFail($id);
        // $final_products->delete_user_id = auth()->user()->id; 
        $final_products->delete();
        return redirect()->route('all-products.index')
            ->with(['deleted_final_products_message' => "Product (ID: $final_products->id) - Deleted successfully from the final products page"]);
    }

    public function delete()
    {
        if(auth()->user()->user_type == 'supplier'){
            $final_products       = FinalProduct::where('supplier_id', auth()->user()->id)->orderBy('created_at','asc')->onlyTrashed()->paginate(5);
            $final_products_count = $final_products->count();
        }
        else{
            $final_products     = FinalProduct::orderBy('created_at','asc')->onlyTrashed()->paginate(5);
            $final_products_count = $final_products->count();
        }

        return view('dashboard.products.final_products.delete',compact('final_products', 'final_products_count'));
    }

    public function restore($id)
    {
        FinalProduct::withTrashed()->find($id)->restore();
        $final_products = FinalProduct::findOrFail($id);
        return redirect()->route('products.delete')
            ->with(['restored_final_products_message' => "Product (ID: $final_products->id) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        FinalProduct::where('id', $id)->forceDelete();
        return redirect()->route('products.delete')
            ->with(['permanent_deleted_final_products_message' => "Permanently deleted successfully!"]);
    }
}
