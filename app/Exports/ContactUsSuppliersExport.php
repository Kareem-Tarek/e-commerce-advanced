<?php

namespace App\Exports;

use App\Models\ContactUs;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactUsSuppliersExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings(): array
    {
        return [
            'ID',
            'Info Number',
            'Name', 
            'Phone',
            'Email',
            'Subject',
            'Message',
            'Name (if registered)',
            'User Type',
        ];
    }

    // public function collection()
    // {
    //     return SubCategory::all();
    // }

    public function array():array
     {
        $contact_us_data = ContactUs::where('user_type', 'supplier')->get();

        $array = [];
        foreach($contact_us_data as $contact_us_datum){
            if($contact_us_datum->phone == null){
                $contact_us_datum->phone = 'N/A';
            }
            else{
                $contact_us_datum->phone;
            }
            if($contact_us_datum->subject == null){
                $contact_us_datum->subject = 'N/A';
            }
            else{
                $contact_us_datum->subject;
            }
            if($contact_us_datum->user->name == null){
                $contact_us_datum->user->username;
            }
            else{
                $contact_us_datum->user->name;
            }

            $array[] = [
                $contact_us_datum->id, 
                $contact_us_datum->info_number, 
                $contact_us_datum->name, 
                $contact_us_datum->phone,
                $contact_us_datum->email, 
                $contact_us_datum->subject,
                $contact_us_datum->message,
                $contact_us_datum->user->name,  //for column "create_user_id" but with the Eloquent Relationship from the Model
                $contact_us_datum->user->user_type,  //for column "user_type" but with the Eloquent Relationship from the Model
            ];
        }
        return $array;

        // if($contact_us_data == null){
        //     return redirect()->route('export-view-contact-us-suppliers')
        //         ->with(['null_data' => "Sorry Sir, there is no data to be exported!"]);
        // }
        // else{
        //     $array = [];
        //     foreach($contact_us_data as $contact_us_datum){
        //         if($contact_us_datum->phone == null){
        //             $contact_us_datum->phone = 'N/A';
        //         }
        //         else{
        //             $contact_us_datum->phone;
        //         }
        //         if($contact_us_datum->subject == null){
        //             $contact_us_datum->subject = 'N/A';
        //         }
        //         else{
        //             $contact_us_datum->subject;
        //         }
        //         if($contact_us_datum->user->name == null){
        //             $contact_us_datum->user->username;
        //         }
        //         else{
        //             $contact_us_datum->user->name;
        //         }

        //         $array[] = [
        //             $contact_us_datum->id, 
        //             $contact_us_datum->info_number, 
        //             $contact_us_datum->name, 
        //             $contact_us_datum->phone,
        //             $contact_us_datum->email, 
        //             $contact_us_datum->subject,
        //             $contact_us_datum->message,
        //             $contact_us_datum->user->name,  //for column "create_user_id" but with the Eloquent Relationship from the Model
        //             $contact_us_datum->user->user_type,  //for column "user_type" but with the Eloquent Relationship from the Model
        //         ];
        //     }
        //     return $array;
        // }
    }

}
