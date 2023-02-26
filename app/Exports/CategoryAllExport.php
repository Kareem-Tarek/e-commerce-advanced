<?php

namespace App\Exports;

use App\Models\Category;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryAllExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Description', 
        ];
    }

    public function array():array
    {
        // return Category::select('id', 'name', 'description')->get();

        $array = [];
        $categories = Category::all();
        foreach($categories as $category){
            if($category->description == null){
                $category->description = 'N/A';
            }
            else{
                $category->description;
            }

            $array[] = [
                $category->id, 
                $category->name, 
                $category->description, 
            ];
        }
        return $array;
    }

}
