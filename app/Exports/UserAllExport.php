<?php

namespace App\Exports;

use App\Models\User;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserAllExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Username', 
            'Email',
            'Verified Account?',
            'User Type',
            'User Status',
            'Phone',
            'Gender', 
            'Date of Birth', 
            'Address',
        ];
    }

    public function array():array
    {
        // return User::select(
        //     'id', 
        //     // 'name', 
        //     'username', 
        //     'email', 
        //     'user_type', 
        //     'status', 
        //     'phone', 
        //     'address',
        // )->get();

        $array = [];
        $users = User::all();
        foreach($users as $user){
            if($user->email_verified_at == null){
                $user_account_verify = 'Unverified';
            }
            else{
                $user_account_verify = 'Verified';
            }

            if($user->phone == null){
                $user->phone = 'N/A';
            }
            else{
                $user->phone = $user->phone;
            }

            if($user->gender == null){
                $user->gender = 'Undetermined?';
            }
            else{
                $user->gender = $user->gender;
            }

            if($user->dob == null){
                $user->dob = 'N/A';
            }
            else{
                $user->dob = date('d-m-Y', strtotime($user->dob));  //the default format of date is (y-m-d), but ow it's converted to (d-m-y)
            }

            if($user->address == null){
                $user->address = 'N/A';
            }
            else{
                $user->address = $user->address;
            }

            $array[] = [
                $user->id, 
                $user->name, 
                $user->username, 
                $user->email, 
                $user_account_verify, 
                $user->user_type, 
                $user->status, 
                $user->phone, 
                $user->gender, 
                $user->dob,
                $user->address, 
            ];
        }
        return $array;
    }

}
