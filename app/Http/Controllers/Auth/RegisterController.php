<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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


    //Over write register view
    public function showRegistrationForm()
    {
        return view('auth.login');
    }

    /**
     * over wright request method.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function register(Request $request)
    {
        $request->validate([
            'type'      => ['required', 'string'],
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name         = $request->input('name');
        $user->email        = $request->input('email');
        $user->password     = Hash::make($request->input('password'));
        $user->api_token    = Str::random(60);
        $user->status       = 1;    //register as enable

        try {
            //User and provider type account
            if ($request->input('type') == 'user'){
                $user->save();
                $user->assignRole('user');
            }elseif ($request->input('type') == 'provider'){
                $user->save();
                $user->assignRole('provider');
            }else{
                return response()->json([
                    'type' => 'dander',
                    'message' => 'Invalid user type',
                ]);
            }
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
                //Get last login information
                \auth()->user()->last_login_at = Carbon::now();
                \auth()->user()->last_login_from_location = 'Under develop';
                \auth()->user()->last_login_from_device = 'Under develop';
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully account created & login.',
                    'url' => route('home'),
                ]);
            }else{
                return response()->json([
                    'type' => 'info',
                    'message' => 'Your account is not activated now. Please wait for approval.',
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }
}
