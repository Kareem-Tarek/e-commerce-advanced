<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /*********************** for login by email, username or phone (currently in use) ***********************/
    public function credentials(Request $request)
    {
        /*
            NOTE: All the following are the same thing: (And means that all are requests from the front-end from an inputs)
                - $request->input('xyz')
                - $request->get('xyz')
                - $request->xyz
         */
        if(is_numeric($request->email)){
            return ['phone' => $request->input('email'), 'password' => $request->password];
        }
        elseif(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return ['email' => $request->get('email'), 'password' => $request->password];
        }
        else{
            return ['username' => $request->email, 'password' => $request->password];
        }
    }
    /*********************** for login by email, username or phone (currently in use) ***********************/

    function authenticated(Request $request, $user){ // used for login at (datetime) and the ip of the computer that was logged in with
        // $user->last_login_at = Carbon::now()->toDateTimeString();
        // $user->last_login_ip = $request->getClientIp();
        // $user->save();

        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(), 
            'last_login_ip' => $request->getClientIp()
        ]);
    }

}
