<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DashboardSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            $sub_categories       = SubCategory::orderBy('created_at','asc')->paginate(5);
            $sub_categories_count = $sub_categories->count();
            return view('dashboard.sub_categories.index', compact('sub_categories', 'sub_categories_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            $category = Category::all();
            return view('dashboard.sub_categories.create', compact('category'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect()->route('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|unique:sub_categories',
            'description' => 'nullable|string',
            'cat_id'      => 'required',
        ]);
        //if the request is valid then proceed to insertion for the entity
        //if the request is not valid, then throw a ValidationException

        $sub_categories                 = new SubCategory();
        $sub_categories->name           = $request->name;
        $sub_categories->description    = $request->description;
        $sub_categories->cat_id         = $request->cat_id;
        $sub_categories->create_user_id = auth()->user()->id;
        $sub_categories->save();

        return redirect()->route('subcategories.index')
            ->with(['added_sub_category_message' => "($sub_categories->name) - Added successfully!"]);
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
        if(auth()->user()->user_type == "admin"){
            $SubCategory_model = SubCategory::findOrFail($id);
            $category          = Category::all();
            return view('dashboard.sub_categories.edit', compact('SubCategory_model', 'category'));
        }
        elseif(auth()->user()->user_type == "moderator"){
            return redirect('/dashboard/subcategories');
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
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
        // $request->validate([
        //     'name'        => 'required|string|unique:sub_categories',
        //     'description' => 'nullable|string',
        //     'cat_id'      => 'required',
        // ]);

        $sub_categories_old = SubCategory::findOrFail($id);    //this variable is used only to get the old data
        //$category = Category::find($id);
        // if($category->id == $sub_categories->cat_id){
        //     $category_name = $category->name;
        // }

        $sub_categories                 = SubCategory::findOrFail($id);
        $sub_categories->update_user_id = auth()->user()->id;

        if($request->name == $sub_categories_old->name &&   //nothing changed in all the columns!
        $request->cat_id == $sub_categories_old->cat_id && 
        $request->description == $sub_categories_old->description){
            return redirect()->route('subcategories.index')
            ->with(['updated_same_name_sub_category_message' => "You entered the same values of sub-category, category & description for sub-category ($sub_categories->name). There are no changes made, please try again!"]);
        }
        ///
        elseif($request->name != $sub_categories_old->name &&   //only "name" column is changed!
        $request->cat_id == $sub_categories_old->cat_id && 
        $request->description == $sub_categories_old->description){
            $sub_categories->name        = $request->name;
            $sub_categories->cat_id      = $sub_categories_old->cat_id;
            $sub_categories->description = $sub_categories_old->description;
            $sub_categories->save();
            return redirect()->route('subcategories.index')
            ->with(['updated_sub_category_message' => "The sub-category ($sub_categories_old->name) has been changed to ($sub_categories->name) successfully!"]);
        }
        elseif($request->name == $sub_categories_old->name &&   //only "cat_id" column is changed!
        $request->cat_id != $sub_categories_old->cat_id && 
        $request->description == $sub_categories_old->description){
            $sub_categories->name        = $sub_categories_old->name;
            $sub_categories->cat_id      = $request->cat_id;
            $sub_categories->description = $sub_categories_old->description;
            $sub_categories->save();
            // return redirect()->route('subcategories.index')
            // ->with(['updated_sub_category_message' => "The sub-category's ($sub_categories->name) category has been changed from ($category->name) to ($sub_categories->cat_id) - Edited successfully!"]);
            return redirect()->route('subcategories.index')
            ->with(['updated_sub_category_message' => "The sub-category's ($sub_categories->name) category has been changed successfully!"]);
        }
        elseif($request->name == $sub_categories_old->name &&   //only "description" column is changed!
        $request->cat_id == $sub_categories_old->cat_id && 
        $request->description != $sub_categories_old->description){
            $sub_categories->name        = $sub_categories_old->name;
            $sub_categories->cat_id      = $sub_categories_old->cat_id;
            $sub_categories->description = $request->description;
            $sub_categories->save();
            return redirect()->route('subcategories.index')
            ->with(['updated_sub_category_message' => "The sub-category's ($sub_categories->name) description has been changed successfully!"]);
        }
        elseif($request->name != $sub_categories_old->name &&   //only "name" & "description" columns are changed!
        $request->cat_id == $sub_categories_old->cat_id && 
        $request->description != $sub_categories_old->description){
            $sub_categories->name        = $request->name;
            $sub_categories->cat_id      = $sub_categories_old->cat_id;
            $sub_categories->description = $request->description;
            $sub_categories->save();
            return redirect()->route('subcategories.index')
            ->with(['updated_sub_category_message' => "The sub-category ($sub_categories_old->name) has been changed to ($sub_categories->name) + its description has been changed successfully!"]);
        }
        elseif($request->name != $sub_categories_old->name &&   //only "name" & "cat_id" columns are changed!
        $request->cat_id != $sub_categories_old->cat_id && 
        $request->description == $sub_categories_old->description){
            $sub_categories->name        = $request->name;
            $sub_categories->cat_id      = $request->cat_id;
            $sub_categories->description = $sub_categories_old->description;
            $sub_categories->save();
            return redirect()->route('subcategories.index')
            ->with(['updated_sub_category_message' => "The sub-category ($sub_categories_old->name) has been changed to ($sub_categories->name) + its category has been changed successfully!"]);
        }
        elseif($request->name == $sub_categories_old->name &&   //only "description" & "cat_id" columns are changed!
        $request->cat_id != $sub_categories_old->cat_id && 
        $request->description != $sub_categories_old->description){
            $sub_categories->name        = $sub_categories_old->name;
            $sub_categories->cat_id      = $request->cat_id;
            $sub_categories->description = $request->description;
            $sub_categories->save();
            return redirect()->route('subcategories.index')
            ->with(['updated_sub_category_message' => "The sub-category's ($sub_categories->name) category & description have been changed successfully!"]);
        }
        elseif($request->name != $sub_categories_old->name &&   //all the columns are changed!
        $request->cat_id != $sub_categories_old->cat_id && 
        $request->description != $sub_categories_old->description){
            $sub_categories->name        = $request->name;
            $sub_categories->cat_id      = $request->cat_id;
            $sub_categories->description = $request->description;
            $sub_categories->save();
            return redirect()->route('subcategories.index')
            ->with(['updated_sub_category_message' => "The sub-category ($sub_categories_old->name) has been changed to ($sub_categories->name) + its category & description have been changed successfully!"]);
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
        $sub_categories                 = SubCategory::findOrFail($id);
        $sub_categories->delete_user_id = auth()->user()->id; 
        $sub_categories->delete();
        return redirect()->route('subcategories.index')
            ->with(['deleted_sub_category_message' => "($sub_categories->name) - Deleted successfully from the sub-categories main page"]);
    }

    public function delete()
    {
        $sub_categories       = SubCategory::orderBy('created_at','asc')->onlyTrashed()->paginate(5);
        $sub_categories_count = $sub_categories->count();
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.sub_categories.delete',compact('sub_categories', 'sub_categories_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function restore($id)
    {
        SubCategory::withTrashed()->find($id)->restore();
        $sub_categories = SubCategory::findOrFail($id);
        return redirect()->route('subcategories.delete')
            ->with(['restored_sub_category_message' => "($sub_categories->name) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        SubCategory::where('id', $id)->forceDelete();
        return redirect()->route('subcategories.delete')
            ->with(['permanent_deleted_sub_category_message' => "Permanently deleted successfully!"]);
    }

}
