<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            $categories       = Category::orderBy('created_at','asc')->paginate(5);
            $categories_count = $categories->count();
            return view('dashboard.categories.index',compact('categories', 'categories_count'));
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
            return view('dashboard.categories.create');
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
            'name'        => 'required|string|unique:categories',
            'description' => 'nullable|string',
        ]);
        //if the request is valid then proceed to insertion for the entity
        //if the request is not valid, then throw a ValidationException

        $categories                 = new Category();
        $categories->name           = $request->name;
        $categories->description    = $request->description;
        $categories->create_user_id = auth()->user()->id;
        $categories->save();

        return redirect()->route('categories.index')
            ->with(['added_category_message' => "($categories->name) - Added successfully!"]);
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
            $Category_model = Category::findOrFail($id);
            return view('dashboard.categories.edit', compact('Category_model'));
        }
        elseif(auth()->user()->user_type == "moderator"){
            return redirect('/dashboard/categories');
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
        $categories_old = Category::findOrFail($id);    //this variable is used only to get the old data

        // $request->validate([
        //     'name'        => 'required|string|unique:categories,name',
        //     // 'name'        => ['required', Rule::unique('categories')->ignore($this->request->id)],
        //     'description' => 'nullable|string',
        // ]);


        // Validator::make($request->all(), [
        //     'name' => ['required', Rule::unique('categories')->ignore($id)],
        //     'description' => 'nullable',
        // ]);

        Validator::make($request->all(), [
            'name' => ['required', 'unique:categories', Rule::unique('categories')->ignore($id)],
            'description' => 'nullable',
        ]);

        $categories                 = Category::findOrFail($id);
        if($request->name == $categories_old->name){
            return redirect()->route('categories.index')
            ->with(['updated_same_name_category_message' => "You entered the same category name ($categories->name). There are no changes made, please try again!"]);
        }
        else{
            $categories->name = $request->name;
        }
        $categories->description    = $request->description;
        $categories->update_user_id = auth()->user()->id;
        $categories->save();

        return redirect()->route('categories.index')
            ->with(['updated_category_message' => "$categories_old->name → ($categories->name) - Edited successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories                 = Category::findOrFail($id);
        $categories->delete_user_id = auth()->user()->id; 
        $categories->delete();
        return redirect()->route('categories.index')
            ->with(['deleted_category_message' => "($categories->name) - Deleted successfully from the categories main page"]);
    }

    public function delete()
    {
        $categories       = Category::orderBy('created_at','asc')->onlyTrashed()->paginate(5);
        $categories_count = $categories->count();
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.categories.delete',compact('categories', 'categories_count'));
        }
        elseif(auth()->user()->user_type == "supplier"){
            return redirect('/dashboard');
        }
    }

    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        $categories = Category::findOrFail($id);
        return redirect()->route('categories.delete')
            ->with(['restored_category_message' => "($categories->name) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        Category::where('id', $id)->forceDelete();
        return redirect()->route('categories.delete')
            ->with(['permanent_deleted_category_message' => "Permanently deleted successfully!"]);
    }

}
