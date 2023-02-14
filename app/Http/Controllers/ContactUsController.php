<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index_for_all_contact_us_info(){
        $all_contact_us       = ContactUs::paginate(10);
        $all_contact_us_count = $all_contact_us->count();
        $all_contact_us_registered_count = $all_contact_us->whereNotNull('create_user_id')->count();
        $all_contact_us_unregistered_count = $all_contact_us->whereNull('create_user_id')->count();
        $all_contact_us_customers_count = $all_contact_us->whereNotNull('create_user_id')->where('user_type', 'customer')->count();
        $all_contact_us_suppliers_count = $all_contact_us->whereNotNull('create_user_id')->where('user_type', 'supplier')->count();
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.contact_us.index_all_contact_info', compact('all_contact_us', 'all_contact_us_count', 
            'all_contact_us_registered_count', 'all_contact_us_unregistered_count',
             'all_contact_us_customers_count', 'all_contact_us_suppliers_count'));
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    public function registered_users_contact_us_info(){
        $registered_users_contact_us       = ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->paginate(10);
        $registered_users_contact_us_count = $registered_users_contact_us->count();
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.contact_us.registered_users_contact_info', compact('registered_users_contact_us', 'registered_users_contact_us_count'));
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    public function customers_contact_us_info(){
        $customers_contact_us       = ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->where('user_type', 'customer')->paginate(10);
        $customers_contact_us_count = $customers_contact_us->count();
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.contact_us.customers_contact_info', compact('customers_contact_us', 'customers_contact_us_count'));
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    public function suppliers_contact_us_info(){
        $suppliers_contact_us       = ContactUs::whereNotNull('create_user_id')->whereNotNull('user_type')->where('user_type', 'supplier')->paginate(10);
        $suppliers_contact_us_count = $suppliers_contact_us->count();
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.contact_us.suppliers_contact_info', compact('suppliers_contact_us', 'suppliers_contact_us_count'));
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    public function unregistered_users_contact_us_info(){
        $unregistered_users_contact_us       = ContactUs::whereNull('create_user_id')->whereNull('user_type')->paginate(10);
        $unregistered_users_contact_us_count = $unregistered_users_contact_us->count();
        
        if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator"){
            return view('dashboard.contact_us.unregistered_users_contact_info', compact('unregistered_users_contact_us', 'unregistered_users_contact_us_count'));
        }
        else{
            return redirect()->route('dashboard');
        }
    }

    // public function index_for_each_sender(){
    //     $all_my_contact_us       = ContactUs::where('create_user_id', auth()->user()->id)->paginate(10);
    //     $all_my_contact_us_count = $all_my_contact_us->count();
    //     if(auth()->user()->user_type == "customer" || auth()->user()->user_type == "supplier"){
    //         return view('', compact('all_my_contact_us', 'all_my_contact_us_count'));
    //     }
    //     else{
    //         return redirect()->back();
    //     }
    // }

    public function create(){
        return view('layouts.website.contact-us');
    }

    public function store(Request $request){
        $contact_us              = new ContactUs;
        if(auth()->user()){
            $contact_us->create_user_id = auth()->user()->id;
            $contact_us->user_type      = auth()->user()->user_type;
            if($request->email != auth()->user()->email){
                return redirect(url()->previous().'#contact-info-container')->with('contact_unsuccessful_message' , 'You entered a wrong email! Please try again.');
            }
            else{
                $contact_us->email = $request->email;
            }
        }
        elseif(!auth()->user()){
            // $contact_us->create_user_id = null;
            // $contact_us->user_type      = null;
            $contact_us->email = $request->email;
        }
        $contact_us->info_number = substr(uniqid(),8,13).Carbon::now()->format('dmys');
        $contact_us->name        = $request->name;
        $contact_us->email       = $request->email;
        $contact_us->phone       = $request->phone;
        $contact_us->subject     = $request->subject;
        $contact_us->message     = $request->message;
        $contact_us->updated_at  = null;
        $contact_us->save();

        return redirect(url()->previous().'#contact-info-container')->with('contact_successful_message' , "You submitted your contact us info successfully! Contact info number ($contact_us->info_number)");
    }

    public function destroy($id){
        $contact_us                 = ContactUs::findOrFail($id);
        // $contact_us->delete_user_id = auth()->user()->id; 
        $contact_us->delete();
        return redirect()->route('contact-us.index')
            ->with(['deleted_contact_us_message' => "Contact info number [$contact_us->info_number] which belongs to ($contact_us->name / $contact_us->email) has been deleted successfully!"]);
    }
}
