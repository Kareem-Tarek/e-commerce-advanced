<?php

namespace App\Imports;

// use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportUser implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'username'  => $row[0], //1st row
            'name'      => $row[1], //2nd row
            'email'     => $row[2], //3rd row
            'password'  => bcrypt($row[3]), //4th row
            'user_type' => $row[4], //5th row
            'status'    => $row[5], //6th row
        ]);
    }
}
