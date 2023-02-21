<?php

namespace App\Exports;

use App\Models\SubCategory;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportSubCategory implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $category = Category::find($id);

        // if( SubCategory::where('cat_id', $category->id)){
        //     $result = SubCategory::where('cat_id', $category->name)->get();
        // }
        // else{
        //     $result = SubCategory::all();
        // }

        // return $result;

        return SubCategory::all();;
    }
}
