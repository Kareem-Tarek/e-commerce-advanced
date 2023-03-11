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
        $phone   = $row[6];
        $address = $row[7];
        if($phone == null){
            $phone = null;
        }
        else{
            $phone = $row[6];
        }
        if($address == null){
            $address = null;
        }
        else{
            $address = $row[7];
        }

        return new User([
            'name'       => $row[0], //1st row
            'username'   => $row[1], //2nd row
            'email'      => $row[2], //3rd row
            'password'   => bcrypt($row[3]), //4th row
            'user_type'  => $row[4], //5th row
            'status'     => $row[5], //6th row
            'phone'      => $phone, //7th row
            'address'    => $address, //8th row
            'updated_at' => null,
        ]);
    }
}
