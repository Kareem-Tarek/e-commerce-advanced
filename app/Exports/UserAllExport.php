<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserAllExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return User::select(
            'id', 
            // 'name', 
            'username', 
            'email', 
            'user_type', 
            'status', 
            'phone', 
            'address',
        )->get();
    }

}
