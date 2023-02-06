<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.website.contact-us');
    }

    // public function contactGuest()
    // {
    //     return view('layouts.website.contact.contact-guest');
    // }

    // public function contact_success_view()
    // {
    //     return view('layouts.website.contact.contact-success'); // for guests
    // }

    // public function submit_contact_form(Request $request)
    // {
    //     if(isset(auth()->user()->user_type)){
    //         if(auth()->user()->user_type == "customer" || auth()->user()->user_type == "supplier"){
    //             $user             = auth()->user(); // Contact Us is allowed for the user type "customer" & "supplier" by using their email (with their registered email) and also guests (email could be anything)
    //             $user_email       = auth()->user()->email; // User's email column from the DB
    
    //             $contact          = new Contact;
    //             $contact->name    = $request->name;
    //             $contact->phone   = $user->phone;
    //             if($request->email == $user_email){ // the correct condition!
    //                 $contact->email = $request->email;
    //             }
    //             elseif($request->email != $user_email){
    //                 return redirect('http://localhost:8000/contact-us#contact-form')->with('contact_unsuccessful_message' , "The email that you entered is wrong! Please try to enter your email again.");
    //             }
    //             // elseif(!auth()->user() && $request->email != $user_email){ // wrong condition
    //             //     $contact->email = $request->email;
    //             //     return $subscription_section->with('subscription_successful_guest_message' , "You submitted the contact info as a guest.\nThank you for getting in touch!\nWe appreciate you contacting us. One of our teams will get back in touch with you soon! Have a great day!");
    //             // }
    //             $contact->subject = $request->subject;
    //             $contact->message = $request->message;
    //             $contact->user_id = $user->id;
    //         }
    //     }

    //     elseif(!auth()->user()){
    //         return redirect()->route('contact-guest'); // for guests
    //     }
    
    //     $contact->save();

    //     return redirect()->route('contact_info_submitted');
    //     //->with('contact_successful_message' , "Thank you for getting in touch!\nWe appreciate you contacting us. One of our teams will get back in touch with you soon! Have a great day!");
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
