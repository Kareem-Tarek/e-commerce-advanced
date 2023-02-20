<?php

namespace App\Imports;

use Carbon\Carbon;
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
        return new SubCategory([
            'name'        => $row[0],
            'description' => $row[1],
            'cat_id'      => $row[2],
            'created_at'  => Carbon::now(),
        ]);
    }
}
