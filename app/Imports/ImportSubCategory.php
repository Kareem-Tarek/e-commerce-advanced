<?php

namespace App\Imports;

// use Carbon\Carbon;
use App\Models\SubCategory;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportSubCategory implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $description = $row[1];
        if($description == null){
            $description = null;
        }
        else{
            $description = $row[1];
        }

        return new SubCategory([
            'name'        => $row[0], //1st row
            'description' => $description, //2nd row
            'cat_id'      => $row[2], //3rd row
            'updated_at'  => null,
        ]);
    }
}
