<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => ['nullable', 'string', 'max:255'],
            'username'  => ['required', 'string', 'max:255', 'unique:users'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'user_type' => ['required', 'in:supplier,customer'],
            'phone'     => ['nullable','string', 'min:11', 'max:11', 'unique:users'],
            'avatar'    => ['nullable', 'mimes:jpg,jpeg,png'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $avatar = $data['avatar'];

        if($avatar == null){
            $avatar = null;
        }
        else{
            $avatar = '/assets/images/avatars/'.$avatar;
        }

        return User::create([
            'name'      => $data['name'],
            'username'  => $data['username'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']), //the correct method for password. Hashed password in the DB! (by using "Hash")
            // 'password' => $data['password'], //the wrong method for password. NOT Hashed password in the DB!
            'user_type' => $data['user_type'],
            'phone'     => $data['phone'],
            'avatar'    => $avatar, //the correct method for avatar
            // 'avatar'    => '/assets/images/avatars/'.$data['avatar'], //the wrong method for avatar
        ]);
    }
}
