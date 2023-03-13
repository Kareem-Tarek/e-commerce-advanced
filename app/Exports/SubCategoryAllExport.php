<?php

namespace App\Exports;

use App\Models\SubCategory;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SubCategoryAllExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'ID',
            'Name (Sub-category)',
            'Description', 
            'Category (Sub-category of)',
        ];
    }

    public function array():array
    {
        $array = [];
        $sub_categories = SubCategory::all();
        foreach($sub_categories as $sub_category){
            if($sub_category->description == null){
                $sub_category->description = 'N/A';
            }
            else{
                $sub_category->description = $sub_category->description;
            }

            $array[] = [
                $sub_category->id, 
                $sub_category->name, 
                $sub_category->description, 
                $sub_category->Category->name,  //for column "cat_id" but with the Eloquent Relationship from the Model
            ];
        }
        return $array;
    }

}
