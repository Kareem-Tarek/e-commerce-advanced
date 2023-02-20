<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCategory implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'name'        => $row[0], //1st row
            'description' => $row[1], //2nd row
            'updated_at'  => null,
        ]);
    }
}
