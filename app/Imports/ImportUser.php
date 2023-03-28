<?php

namespace App\Imports;

// use Carbon\Carbon;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUser implements ToModel
// class ImportUser implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    //-------------------------------- simple method (using array index) --------------------------------//
    public function model(array $row)
    {
        // $phone   = $row[6];
        // $address = $row[7];
        // if($phone == null){
        //     $phone = null;
        // }
        // else{
        //     $phone = $row[6];
        // }
        // if($address == null){
        //     $address = null;
        // }
        // else{
        //     $address = $row[7];
        // }

        return new User([
            'name'       => $row[0], //1st column
            'username'   => $row[1], //2nd column
            'email'      => $row[2], //3rd column
            'password'   => bcrypt($row[3]), //4th column
            'user_type'  => $row[4], //5th column
            'status'     => $row[5] ?? 'active', //6th column (the default value is "active" already from the migration)
            'phone'      => $row[6] ?? null, //7th column
            'address'    => $row[7] ?? null, //8th column
            'updated_at' => null,
        ]);
    }

    //-------------------------------- preferred & more advanecd method (using heading row titles) --------------------------------//
    // public function model(array $row)
    // {
    //     // $phone   = $row['phone']; //6
    //     // $address = $row['address']; //7
    //     // if($phone == null){
    //     //     $phone = null;
    //     // }
    //     // else{
    //     //     $phone = $row['phone'];
    //     // }
    //     // if($address == null){
    //     //     $address = null;
    //     // }
    //     // else{
    //     //     $address = $row['address'];
    //     // }

    //     return new User([
    //         'name'       => $row['name'], //0 -> 1st column
    //         'username'   => $row['username'], //1 -> 2nd column
    //         'email'      => $row['email'], //2 -> 3rd column
    //         'password'   => bcrypt($row['password']), //3 -> 4th column
    //         'user_type'  => $row['user_type'], //4 -> 5th column
    //         'status'     => $row['status'] ?? 'active', //5 -> 6th column (the default value is "active" already from the migration)
    //         'phone'      => $row['phone'] ?? null, //6 -> 7th column
    //         'address'    => $row['address'] ?? null, //7 -> 8th column
    //         'updated_at' => null,
    //     ]);
    // }

}
