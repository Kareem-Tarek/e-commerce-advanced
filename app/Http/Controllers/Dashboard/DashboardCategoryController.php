<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportCategory;
use App\Exports\ExportCategory;

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
    public function store(CategoryRequest $request)
    {
        // $request->validate([
        //     'name'        => 'required|string|max:255|unique:categories',
        //     'description' => 'nullable|string',
        // ]);

        // Validator::make($request->all(), [
        //     'name' => 'required|string|unique:categories',
        //     'description' => 'nullable|string',
        // ]);


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
    public function update(CategoryRequest $request, $id)
    {      
        $categories_old = Category::findOrFail($id);    //this variable is used only to get the old data

        // $request->validate([
        //     'name'        => 'required|max:255|string|unique:categories,name',
        //     // 'name'        => ['required', Rule::unique('categories')->ignore($this->request->id)],
        //     'description' => 'nullable|string',
        // ]);


        // Validator::make($request->all(), [
        //     'name' => ['required', 'max:255', Rule::unique('categories')->ignore($id)],
        //     'description' => 'nullable',
        // ]);

        // Validator::make($request->all(), [
        //     'name' => ['required', 'max:255', 'string', 'unique:categories', Rule::unique('categories')->ignore($this->request->id)],
        //     'description' => 'nullable|string',
        // ]);

        $categories = Category::findOrFail($id);
        $categories->update_user_id = auth()->user()->id;

        if($request->name == $categories_old->name &&   //nothing changed in all the columns!
            $request->description == $categories_old->description){
            return redirect()->route('categories.index')
            ->with(['updated_same_category_message' => "You entered the same category name ($categories->name) & description. There are no changes made, please try again!"]);
        }
        elseif($request->name != $categories_old->name &&   //only "name" column is changed!
        $request->description == $categories_old->description){
            $categories->name        = $request->name;
            $categories->description = $categories_old->description;
            $categories->save();
            return redirect()->route('categories.index')
            ->with(['updated_category_message' => "The category ($categories_old->name) has been changed to ($categories->name) successfully!"]);
        }
        elseif($request->name == $categories_old->name &&   //only "description" column is changed!
        $request->description != $categories_old->description){
            $categories->name        = $categories_old->name;
            $categories->description = $request->description;
            if($categories_old->description == null || $categories_old->description == ""){
                $categories_old->description = 'NULL';
            }
            elseif($categories->description == null || $categories->description == ""){
                $categories->description == 'NULL';
            }
            $categories->save();
            return redirect()->route('categories.index')
            ->with(['updated_category_message' => "The category's ($categories->name) description has been changed from [$categories_old->description] to [$categories->description] successfully!"]);
        }
        elseif($request->name != $categories_old->name &&   //all the columns are changed!
        $request->description != $categories_old->description){
            $categories->name        = $request->name;
            $categories->description = $request->description;
            if($categories_old->description == null || $categories_old->description == ""){
                $categories_old->description = 'NULL';
            }
            elseif($categories->description == null || $categories->description == ""){
                $categories->description == 'NULL';
            }
            $categories->save();
            return redirect()->route('categories.index')
            ->with(['updated_category_message' => "The category ($categories_old->name) has been changed to ($categories->name) + its description has been changed from [$categories_old->description] to [$categories->description] successfully!"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $categories     = Category::findOrFail($id);
    //     // $categories->delete_user_id = auth()->user()->id;
    //     $sub_categories = SubCategory::where('cat_id', $categories->id)->find($id);

    //     if($sub_categories != null){
    //         // $sub_categories_count = $sub_categories->count();
    //         foreach($sub_categories as $sub_category){
    //             $sub_category = SubCategory::where('cat_id', $categories->id)->find($id);
    //             $sub_category->delete();
    //         }
    //         $categories->delete();
    //     }
    //     else{
    //         $categories->delete();
    //     }

    //     return redirect()->route('categories.index')
    //         ->with(['deleted_category_message' => "($categories->name) - Deleted successfully from the categories main page"]);
    // }

    public function destroy($id)
    {
        $category = Category::find($id);
        $sub_cats = SubCategory::where('cat_id', $category->id)->get();
        foreach($sub_cats as $sub_cat){
            $sub_cat->delete();
        }
        $category->delete();

        return redirect()->route('categories.index')
            ->with(['deleted_category_message' => "($category->name) - Deleted successfully from the categories main page"]);
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

    // public function restore($id)
    // {
    //     Category::withTrashed()->find($id)->restore();
    //     $categories = Category::findOrFail($id);
    //     return redirect()->route('categories.delete')
    //         ->with(['restored_category_message' => "($categories->name) - Restored successfully!"]);
    // }

    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        $categories     = Category::findOrFail($id);
        $sub_categories = SubCategory::withTrashed()->get();
        foreach($sub_categories as $sub_category){
            $sub_category->restore();
        }
        return redirect()->route('categories.delete')
            ->with(['restored_category_message' => "($categories->name) - Restored successfully!"]);
    }

    public function forceDelete($id)
    {
        Category::where('id', $id)->forceDelete();
        return redirect()->route('categories.delete')
            ->with(['permanent_deleted_category_message' => "Permanently deleted successfully!"]);
    }

    public function importExportViewCategories(){
        return view('dashboard.categories.excel_imports_exports.import_export_file');
    }
 
    public function importCategories(Request $request){
        $rules = [
            'importing_input'          => 'required|mimes:xlsx,xlx,xls',
        ];

        $messages = [
            'importing_input.required' => "You didn't upload an Excel file! Please try again.",
            'importing_input.mimes'    => "The file's extension you uploaded isn't allowed to be chosen! Please try again.",
        ];

        $this->validate($request, $rules, $messages);

        Excel::import(
            new ImportCategory, 
            $request->file('importing_input')->store('files')
        );

        return redirect()->back()->with(['imported_file_successfully' => 'Your file has been imported to "Categories" successfully!']);
    }
 
    public function exportCategories(){
        return Excel::download(new ExportCategory, Carbon::now()->format('dmys').'_'.'categories.xlsx');
            // ->back()->with(['exported_file_successfully' => "Your file has been exported successfully!"]);
    }

}
