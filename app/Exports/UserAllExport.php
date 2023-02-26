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
            'User Type',
            'Status',
            'Phone',
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
            if($user->phone == null){
                $user->phone = 'N/A';
            }
            else{
                $user->phone;
            }
            if($user->address == null){
                $user->address = 'N/A';
            }
            else{
                $user->address;
            }

            $array[] = [
                $user->id, 
                $user->name, 
                $user->username, 
                $user->email, 
                $user->user_type, 
                $user->status, 
                $user->phone, 
                $user->address, 
            ];
        }
        return $array;
    }

}
