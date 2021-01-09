<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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

    //Over write login post
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if($this->guard()->validate($this->credentials($request))) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
                //Get last login information
                \auth()->user()->last_login_at = Carbon::now();
                \auth()->user()->last_login_from_location = 'Under develop';
                \auth()->user()->last_login_from_device = 'Under develop';
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully login.',
                    'url' => route('home'),
                ]);
            }  else {
                $this->incrementLoginAttempts($request);
                return response()->json([
                    'type' => 'info',
                    'message' => 'This account is not activated.',
                ]);
            }
        } else {
            $this->incrementLoginAttempts($request);
            return response()->json([
                'type' => 'danger',
                'message' => 'Credentials do not match our database.',
            ]);
        }
    }
}
