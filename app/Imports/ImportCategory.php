<?php

namespace App\Imports;

// use Carbon\Carbon;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Imports\HeadingRowFormatter;

// HeadingRowFormatter::default('none');

class ImportCategory implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    // public function headingRow(): int
    // {
    //     return 1;   //this should be the row number of heading row from the Excel file
    // }

    public function model(array $row)
    {
        // $description = $row[1];
        // if($description == null){
        //     $description = null;
        // }
        // else{
        //     $description = $row[1];
        // }

        return new Category([
            'name'        => $row[0], //1st column
            'description' => $row[1] ?? null, //2nd column
            'updated_at'  => null,
        ]);

        // return new Category([
        //     'name'        => $row[0], //1st column
        //     'description' => $row[1], //2nd column
        //     'updated_at'  => null,
        // ]);

        ////////////////////////////////////////////////////////////////////////////

        // $name        = $row[0];
        // $description = $row[1];
        // if($description == null){
        //     $description = null;
        // }
        // else{
        //     $description = $row[1];
        // }

        // return new Category([
        //     'name'        => $name, //1st column
        //     'description' => $description, //2nd column
        //     'updated_at'  => null,
        // ]);

        ////////////////////////////////////////////////////////////////////////////

        // $name        = $row['Name'];    //"Name" row from Excel file
        // $description = $row["Description"]; //"Description" row from Excel file
        // if($description == null){
        //     $description = null;
        // }
        // else{
        //     $description = $row["Description"];
        // }

        // return new Category([
        //     'name'        => $name,
        //     'description' => $description,
        //     // 'updated_at'  => null,
        // ]);

        ////////////////////////////////////////////////////////////////////////////

        // $name        = $row[0];
        // $description = $row[1];
        // if($description == null){
        //     $description = null;
        // }
        // else{
        //     $description = $row[1];
        // }

        // return new Category([
        //     'name'        => $name,
        //     'description' => $description,
        //     'updated_at'  => null,
        // ]);
    }
}
