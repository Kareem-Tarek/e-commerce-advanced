<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function edit_my_profile(){
        $User_model = User::findOrFail(auth()->user()->id);
        return view('layouts.website.profile_management.editMyProfile', compact('User_model'));
    }

    public function update_my_profile(Request $request){

        $user_old        = User::find(auth()->user()->id);

        $user            = User::find(auth()->user()->id);
        $user->name      = $request->name;
        $user->username  = $request->username;
        $user->email     = $request->email;
        $user->phone     = $request->phone;
        $user->dob       = $request->dob;
        if($request->user_type != $user_old->user_type){
            return redirect(url()->previous().'#profile-account-status-info')
            ->with(['user_type_unauthorized_action_message' => "Your requested user type ($request->user_type) is not allowed to be chosen."]);
        }
        else{
            $user->user_type = $request->user_type;
        }
        if($request->avatar == null || $request->avatar == ""){
            $user->avatar = $user_old->avatar;
        }
        else{
            // $user->avatar = "/assets/images/avatars/".$request->avatar;

            // $avatarName = time().'.'.$request->avatar->extension();
            // $request->avatar->move(public_path('assets/images/avatars/'), $avatarName);

            // $avatar_name = $request->avatar;
            // $avatar_name = preg_replace('/\s+/', '', $avatar_name);
            // $NewAvatarName = time() . 'lo-go-' . $avatar_name . '.' . $request->avatar->extension();
            // $path = $request->avatar->move(public_path('assets/avatars/images' , $NewAvatarName));
            // $user->avatar = $NewAvatarName;

            // $request->file('avatar')->move(public_path('assets/avatars/images'), $request->file('avatar')->getClientOriginalName().".".$request->file('avatar')->getClientOriginalExtension()); 
            $request->file('avatar')->getClientOriginalName();
            $user->avatar = $request->avatar;
        }
        if($request->cover == null || $request->cover == ""){
            $user->cover = $user_old->cover;
        }
        else{
            $user->cover = "/assets/images/covers/".$request->cover;
        }
        $user->bio       = $request->bio;
        $user->gender    = $request->gender;
        $user->address   = $request->address;
        $user->whatsapp  = $request->whatsapp;
        $user->facebook  = $request->facebook;
        $user->instagram = $request->instagram;
        $user->save();

        return redirect(url()->previous().'#profile-account-status-info')
        ->with(['updated_profile_message' => "Your profile has been updated successfully!"]);
    }
}
