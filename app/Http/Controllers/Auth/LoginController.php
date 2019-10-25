<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

use App\User;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('guest/login');
    }

    public function login( Request $r ) {

        $email = $r->input('email');
        $user = User::where('email', $email)->first();

        $validator = Validator::make($r->all(), [
            'email'     => 'required|email',
            'password'  => 'required|min:6',
        ],
        [
            'email.required'    => 'Please fill the email',
            'password.required' => 'Please fill the password',
        ]
        );

        $validator->after(function ($validator) use($r,$user) {

            if (!$user) {

                $validator->errors()->add('email', 'Your email has not been found');

            }
            else{

                $r->session()->put('email', $r->username_or_email);

            }

            if (!Hash::check($r->password, $user['password'])) {
                
                $validator->errors()->add('password', 'The password is wrong');

            }
        });


        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
        else{

            $remember = $r->remember;
            ($remember == "on") ?  $remember = true : $remember = false;

            $credentials = $r->only('password');
            $credentials['email'] = $r->email;

            if(Auth::attempt($credentials,$remember)){
                $is_first_login = (int)Auth::user()->is_first_login;
                $type = Auth::user()->type;
                $r->session()->forget('email');
                return redirect($type.'/profile'); 
            }
        }


    }

    public function logout(){
        $userId = Auth::id();
        Auth::logout();
        return redirect('/login');
    }
}
